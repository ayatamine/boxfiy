<?php

namespace App\Http\Controllers\Front\Api;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BallanceHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Notifications\NewOrderNotification;
use App\Notifications\User\NewOrderNotification as UserNewOrderNotification;

class GlobalController extends Controller
{
    //
    public function handler(Request $request)
    {

        $this->validate($request, [
            'key'=>'string|required|min:60',
            'action' => 'required|string|in:services,add,status,balance,refill,refill_status'
        ]);
        $user = User::whereApiKey($request->key)->first();
        if(!$user) return response()->json(['error' => 'No user found with this key'],404);
        $action = $request['action'];
        switch ($action) {
            case 'services':
                return response()->json(
                    Service::latest()->get()
                );
                break;
            case 'add':
                $this->validate($request, [
                    'service' => 'integer|required',
                    'quantity' => 'integer|min:1',
                    'link' => 'string|min:3',
                    'runs' => 'string|nullable',
                    'interval' => 'integer|nullable'
                ]);

                $this->addOrder($request->validated(),$user);
                break;
            case 'status':
                if(array_key_exists('order',$request->all())){
                    $this->validate($request, [
                        'order' => 'integer|required',
                    ]);
                    return $this->fetchOrderStatus($request->order);
                }
                    $this->validate($request, [
                        'orders' => 'string|required',
                    ]);
                    $exploded_ids =explode(',',$request->orders);
                    $ids = array_filter($exploded_ids,fn($item) => $item != '1');
                    $response = array();
                    foreach($ids as $order) {
                        array_push($response,$this->fetchOrderStatus($request->order));
                    }
                    return $response;
                break;
            case 'balance':
                return response()->json([
                   'balance'=>$user->walet_balance,
                   'currency'=>'USD'
                ]);
                break;
        }
    }
    public function fetchOrderStatus($order_id)
    {

        $order = Order::with('service')->wit('service.api')->find($order_id);
        if(!$order) return response()->json(['error'=>'Incorrect Order ID']);
        if ($order->service->data_source !== 'api' || in_array($order->status, ['canceled', 'partial']))  return response()->json([
            "charge" => $order->price, "start_count" => $order->amount, "status" => $order->status,
            "remains" => $order->status == 'completed' ? 0 : $order->amount, "currency" => "USD"
        ]);
        try {
            $response = Http::acceptJson()
                ->post($order->service->api->url, [
                    'key' => $order->service->api->key,
                    'action' => 'status',
                    'order' => $order->order_number
                ]);
            if ($response->successful()) {
                $data = $response->json();
                if ($order->status != Str::lower($data['status'])) {
                    $order->update(['status' => Str::lower($data['status'])]);
                    if (in_array(Str::lower($data['status']), ['canceled', 'partial'])) {
                        $amount = $order->price;
                        if (Str::lower($data['status'] == 'partial')) {
                            //return all money
                            $remains = $data['remains'];
                            $start_count = $data['start_count'];
                            $price = $order->price;
                            $amount = $start_count > 0 ? ($remains * $price / $start_count) : 0;
                        }
                        //update user balance
                        $order->user()->increment('wallet_balance', $amount);
                        //update order refund status
                        $order->update(['was_refunded' => true]);
                        //update user balancehistory
                        $BallanceHistory = BallanceHistory::create([
                            'user_id' => $order->user()?->id,
                            'transaction_type' => BallanceHistory::$RETURN,
                            'amount' => $amount,
                        ]);
                    }
                    return response()->json($data);
                }
            } elseif ($response->clientError()) {
                session()->flash('error', 'There is an error from client side, please contact admins');
                return back();
            } elseif ($response->serverError()) {
                session()->flash('error', 'There is an error occured from api service');
                return back();
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'There is an error from client side, please contact admins');
        }
    }
    public function addOrder($request,$user)
    {
        DB::transaction(function () use ($request,$user) {
            try {
                $service = Service::find($request['service']);
                if(!$service) return response()->json(['No service found with the given id'],404);
                $order = null;
                if ($service->data_source !== 'api') {
                    $order = Order::create([
                        'service_id' => $service->id,
                        'user_id' => $user->id,
                        'link' => $request['link'],
                        'amount' => $request['quantity'],
                        'price' => floatval($request['quantity'] * $service->price) ?? 0,
                        'status' => 'pending'
                    ]);
                } else {
                    $api = $service->api;
                    $response = Http::acceptJson()
                        ->post($api->url, [
                            'key' => $api->key,
                            'action' => 'add',
                            'service' => $service->api_service_id,
                            'link' => $request['link'],
                            'quantity' => $request['quantity'],
                        ]);

                    if ($response->successful()) {
                        $order = Order::create([
                            'service_id' => $service->id,
                            'order_number' => $response->json()['order'],
                            'user_id' => $user->id,
                            'link' => $request['link'],
                            'amount' => $request['quantity'],
                            'price' => floatval($request['quantity'] * $service->price) ?? 0,
                            'status' => 'pending'
                        ]);
                    } elseif ($response->clientError()) {
                        session()->flash('error', 'There is an error from client side, please contact admins');
                        return back();
                    } elseif ($response->serverError()) {
                        session()->flash('error', 'There is an error occured from api service');
                        return back();
                    }
                }
                if ($order) {
                    $user->decrement('wallet_balance', $order->price);
                    $BallanceHistory = BallanceHistory::create([
                        'user_id' => $user->id,
                        'transaction_type' => BallanceHistory::$PURSHASE,
                        'amount' => $order->price,
                    ]);
                    $user->notify(new UserNewOrderNotification($service->name, $order));
                    //notify admin
                    $adminUser = User::where('is_admin', true)->first();
                    if ($adminUser) {
                        $adminUser->notify(new NewOrderNotification($order));
                    }
                    return response()->json(['order'=>$order->id],200);
                }
            } catch (\Exception $ex) {
                session()->flash('error', 'There is an error from client side, please contact admins WITH THIS/' . $ex->getMessage());
            }
        });
    }
}
