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
    public $final_amount;
    public $payment_method=null;
    public ?string $spaceremit_email='ahmed.7ahmedali@gmail.com';
    public ?string $spaceremit_return_page;
    public ?string $spaceremit_notify_page;
    public ?string $custom="";
    public ?string $spaceremit_form_action=null;
    public $min_amount=1;
    public $max_amount;

    public  $isSpaceRemitPayment=false;
    public $payment_gateways;
    
    public function mount()
    {
        $this->spaceremit_return_page =route('addFunds');
        $this->spaceremit_notify_page=route('spaceremit.notify');
        $this->payment_gateways = PaymentGateway::select('name','unique_keyword',
        'logo','is_attached_with_spaceremit','how_to_pay_description','min_amount',
        'max_amount',)->latest()->get();
    }
    public function incrementAmount()
    {
        if($this->max_amount == $this->amount) return;
        $this->amount++;
        $this->final_amount = $this->amount;
    }
    public function decrementAmount()
    {
        if($this->min_amount == $this->amount) return;
        $this->amount--;
        $this->final_amount = $this->amount;
    }
    public function updatedPaymentMethod($value)
    {
            $payment_gateway =json_decode( $this->payment_method);
            $this->min_amount = $payment_gateway->min_amount;
            $this->max_amount = $payment_gateway->max_amount;
          
       
    }
    public function submitAddFund(){
        $payment_gateway =json_decode( $this->payment_method);
        if($payment_gateway?->unique_keyword !== 'spaceremit')
        {
            // $payment_gateway = PaymentGateway::where('unique_keyword',$this->payment_method)->first();
            if($payment_gateway?->is_attached_with_spaceremit)
            {
                $this->dispatchBrowserEvent('submit-spaceremit-form',['amount'=>$this->amount]);

            }else
            {
               //    
            }
           
        }else
        {
            $this->dispatchBrowserEvent('submit-spaceremit-form',['amount'=>$this->amount]);
        }
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
