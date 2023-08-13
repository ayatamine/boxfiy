<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddFunds extends Component
{
    public $amount=0;
    public $payment_method=null;
    public function submitAddFund(){
        dd($this->payment_method.' '.$this->amount);
    }
    public function render()
    {
        return view('livewire.add-funds');
    }
}
