<?php

namespace App\Http\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Dipesh79\LaravelPayeerCheckout\LaravelPayeerCheckout;

class AddFunds extends Component
{
    public $amount=10;
    public $payment_method=null;
    public ?string $spaceremit_email='ahmed.7ahmedali@gmail.com';
    public ?string $spaceremit_return_page;
    public ?string $spaceremit_notify_page;
    public ?string $custom="";
    public  $isSpaceRemitPayment=false;
    public function mount()
    {
        $this->spaceremit_return_page =route('addFunds');
        $this->spaceremit_notify_page=route('spaceremit.notify');
    }
    public function submitAddFund(){
        // dd($this->payment_method.' '.$this->amount);
        $this->initiatePayment();
    }
    public function initiatePayment()
    {
        $payment_gateway = PaymentGateway::where('unique_keyword',$this->payment_method)->first();

        if(!$payment_gateway){
            $this->dispatchBrowserEvent('payment-gateway-not-supported');
        }
       
        if($this->payment_method == 'spaceremit')    return $this->payWithSpaceRemit();

        if($this->payment_method == 'payeer') 
        {
            $credentials = [];


            foreach ($payment_gateway->credentials as $innerArray) {
                $credentials[$innerArray["name"]] = $innerArray["value"];
            }
            $payeer_shop_id = $credentials['shop_id'];
            $payeer_merchent_key = $credentials['merchant_key'];
            Config::set('payeer.shop',$payeer_shop_id);
            Config::set('payeer.merchant_key',$payeer_merchent_key);

            return $this->payWithPayeer();
        } 

        // // Example for Payyer
        // $payyerResponse = $client->post('https://api.payyer.com/v1/orders', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . config('services.payyer.api_key'),
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         'amount' => 100, // Amount in cents
        //         // ...
        //     ],
        // ]);

        // Handle the responses and update user balance and history
        // ...
    }
    // public function payWithSpaceRemit(){
    //     $this->isSpaceRemitPayment = true;
    //     return true;
    // }
    public function payWithPayeer()
    {
          //Store payment details in DB with pending status
        $payment = new LaravelPayeerCheckout();
        $amount = $this->amount; 
        $order_id = rand(1000,10000); //Your Unique Order Id
        $description = "Add Funds"; //Your Order Description which will be shown in payeer dashboard 
        $currency = 'USD';
        return redirect($payment->payeerCheckout($amount,$order_id,$description,$currency));
    }
    public function render()
    {
        return view('livewire.add-funds');
    }
}
