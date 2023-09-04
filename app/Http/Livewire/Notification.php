<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;
    public function paginationView()
    {
        return 'livewire.custom-pagination2';
    }
    public function render()
    {
        $notifications = Auth::user()->notifications()->paginate(10) ;

        return view('livewire.notification',[
            'notifications'=>$notifications
        ]);
    }
}
