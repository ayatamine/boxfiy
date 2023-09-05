<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Models\BallanceHistory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchOrdersState extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-orders-state';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch orders status for each online user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('start fetching users orders status.');

        $users = User::where('last_seen', '>=', now()->subMinutes(5))->get();

        foreach ($users as $user) {
            // Fetch the user's orders
            $orders = Order::where('user_id', $user->id)
                ->whereHas('service',function($query){
                    $query->where('data_source', 'api');
                })
                ->whereNotIn('status',['canceled','partial','completed'])
                ->get();

            // Loop through each order
            foreach ($orders as $record) {
               //fetch status from api and update data
                $api = $record->service->api;
                try {
                    $response = Http::acceptJson()
                        ->post($record->service->api->url, [
                            'key' => $record->service->api->key,
                            'action' => 'status',
                            'order' => $record->order_number
                        ]);
                    if ($response->successful()) {
                        $data = $response->json();
                        if ($record->status != Str::lower($data['status'])) {
                            $record->update(['status' => Str::lower($data['status'])]);
                            if (in_array(Str::lower($data['status']), ['canceled', 'partial'])) {
                                $amount = $record->price;
                                if (Str::lower($data['status'] == 'partial')) {
                                    //return all money
                                    $remains = $data['remains'];
                                    $start_count = $data['start_count'];
                                    $price = $record->price;
                                    $amount = $start_count > 0 ? ($remains * $price / $start_count) : 0;
                                }
                                $record->user()->increment('wallet_balance', $amount);
                                $BallanceHistory = BallanceHistory::create([
                                    'user_id' => $record->user()?->id,
                                    'transaction_type' => BallanceHistory::$RETURN,
                                    'amount' => $amount,
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
                } catch (\Exception $ex) {
                    session()->flash('error', 'There is an error from client side, please contact admins');
                }
            }
        }

        $this->info('Successfully fetched users orders status.');
    }
}
