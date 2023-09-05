<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;
    public function paginationView()
    {
        return 'livewire.custom-pagination2';
    }
    public function render()
    {
        return view('livewire.tickets',[
            'tickets'=>Ticket::whereUserId(auth()->id())->latest()->paginate(10)
        ]);
    }
}
