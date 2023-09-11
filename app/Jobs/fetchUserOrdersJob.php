<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Models\BallanceHistory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class fetchUserOrdersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('start fetching user orders');
        // $user= auth()->user();
      
            // Fetch the user's orders
            $orders = Order::where('user_id', $this->user->id)
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
                        ->post($api->url, [
                            'key' => $api->key,
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
                       Log::error('There is an error from client side, please contact admins');
                    } elseif ($response->serverError()) {
                       Log::error('There is an error occured from api service');
                    }
                } catch (\Exception $ex) {
                   Log::error($ex->getMessage());
                }
            }
            Log::info('finish fetching user orders');

    }
}
