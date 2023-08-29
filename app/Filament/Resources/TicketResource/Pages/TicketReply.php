<?php

namespace App\Filament\Resources\TicketResource\Pages;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;
use Filament\Pages\Actions;
use App\Models\TicketReply as Reply;
use Filament\Notifications\Notification;
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
       if(request()->has('notification_id')) markSingleNotificationsAsRead(request()->get('notification_id'),$with_notify=false);
       $ticket = Ticket::with('replies')->find($this->record->id);

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
    public function closeTicket()
    {
        Ticket::findOrFail($this->record->id)->update(['status'=>'closed']);
        Notification::make()
            ->title('The Ticket closed successfully')
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();
         return redirect()->route('filament.resources.tickets.view',['record'=>$this->record->id]);
    }
    public function openTicket()
    {
        Ticket::findOrFail($this->record->id)->update(['status'=>'open']);
        Notification::make()
            ->title('The Ticket Opened successfully')
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->send();
         return redirect()->route('filament.resources.tickets.view',['record'=>$this->record->id]);
    }
}
