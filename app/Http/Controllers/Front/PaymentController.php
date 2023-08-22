<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BallanceHistory;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function spaceremitNotify(Request $request)
    {
        $requiredParameters = ['sender_email', 'receiver_email', 'payment_code', 'total_amount', 'date', 'tax', 'status'];
        foreach ($requiredParameters as $param) {
            if (!$request->has($param) || $request->input($param) === '') {
                // Payment data is incomplete, handle the error
                return response('Invalid payment data', 400); // 400 Bad Request
            }
        }

        // Collect the payment data into an array
        $paymentData = $request->only($requiredParameters);

        // Send a request to Spaceremit's API
        $spaceremitApiUrl = 'http://spaceremit.com/api/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $spaceremitApiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($paymentData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);

        if ($server_output === "VALID_PAYMENT") {
            // Payment is valid, perform further actions
            auth()->user()->update(['ballance' =>$requiredParameters['total_amount']]);
            BallanceHistory::create(
                [
                    'user_id'=>auth()->id(),
                    'transaction_type' =>'credit_ballance',
                    'amount' =>$requiredParameters['total_amount'],
                    'payment_gateway_id'=> PaymentGateway::where('unique_keyword','spaceremit')->first()?->id ?? null,
                ]
                );
            session()->flash('success','Your ballance has been credited successfully');
            return redirect()->route('wallet');
        } else {
            session()->flash('error','The payment opertion failed, please try again');
            return redirect()->route('addFunds');
        }
    }
}
