<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Support\Str;
use App\Models\BallanceHistory;
use Illuminate\Support\Facades\Http;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\OrderResource;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected static string $view = 'filament.pages.orders.view';

    protected function getViewData(): array
    {
        if(request()->has('notification_id')) markSingleNotificationsAsRead(request()->get('notification_id'),$with_notify=false);
        $data =[];
        if($this->record->service->data_source == 'api' && !in_array($this->record->status,['partial','canceled','completed'])) {
            $api = $this->record->service->api;
            try {
                $response = Http::acceptJson()
                            ->post($api->url, [
                                'key' => $api->key,
                                'action' => 'status',
                                'order' => $this->record->order_number
                            ]);
                if ($response->successful()) {
                    $data['order_status'] = $response->json();
                    if($this->record->status != Str::lower($data['order_status']['status'])) 
                    {
                        $this->record->update(['status' => Str::lower($data['order_status']['status'])]);
                        if(in_array(Str::lower($data['order_status']['status']) ,['canceled','partial']))
                        {
                            $amount = $this->record->price;
                            if(Str::lower($data['order_status']['status'] == 'partial'))
                            {
                                //return all money
                                $remains = $data['order_status']['remains'];
                                $start_count = $data['order_status']['start_count'];
                                $price = $this->record->price;
                                $amount = $start_count > 0 ? ($remains * $price / $start_count) : 0;
                            }
                            $this->record->user()->increment('wallet_balance', $amount);
                            $BallanceHistory = BallanceHistory::create([
                                'user_id' => $this->record->user()?->id,
                                'transaction_type' =>BallanceHistory::$RETURN,
                                'amount' =>$amount,
                            ]);
                        }
                    }
                } elseif ($response->clientError()) {
                    session()->flash('error', 'There is an error from client side, please contact admins');
                    return back();
                } elseif ($response->serverError()) {
                    session()->flash('error', 'There is an error occured from api service');
                    return back();
                }
            }
            catch(\Exception $ex)
            {
                session()->flash('error', 'There is an error from client side, please contact admins');  
            }
        }
    //   $order =Order

    //    return [
    //     'ticket'=>$ticket
    //    ];
       return $data;
    }
  
}
