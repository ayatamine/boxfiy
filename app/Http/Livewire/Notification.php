<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $notifications;

    public function render()
    {
        $this->notifications = Auth::user()->notifications;

        return view('livewire.notification',[
            'notifications'=>$this->notifications
        ]);
    }
}
