<?php

namespace App\Filament\Resources\TicketResource\Pages;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use Filament\Pages\Actions;
use App\Models\TicketReply as Reply;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\TicketResource;
use App\Notifications\User\NewTicketReplyNotification;

class TicketReply extends ViewRecord
{
    protected static string $resource = TicketResource::class;
    protected static string $view = 'filament.pages.tickets.replies';
    public $message;
    protected function getViewData(): array
    {
       $ticket = Ticket::with('replies')->find(1);
       return [
        'ticket'=>$ticket
       ];
    }
    public function addReply()
    {
       
        $this->validate([
            'message'=>'required|min:3|max:300|string'
        ]);
        $reply = Reply::create([
            'message'=> $this->message,
            'ticket_id'=>$this->record->id,
            'user_id'=>auth()->id()
        ]);
        $user = User::findOrFail($this->record->user_id); 
        $last_reply = Reply::where('user_id',$this->record->user_id)->latest()->first();
        
        $lastMessageTimestamp = Carbon::parse($last_reply->created_at);
        $currentTimestamp = Carbon::now();

        $minutesSinceLastMessage = $currentTimestamp->diffInMinutes($lastMessageTimestamp);
        
        if ($minutesSinceLastMessage > 10) {
            $user->notify(new NewTicketReplyNotification($reply));
        }
      
        $this->message =null;
    }
}
