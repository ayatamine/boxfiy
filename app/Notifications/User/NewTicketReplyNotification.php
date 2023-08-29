<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTicketReplyNotification extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     */
    public $data;
    
    public function __construct($data)
    {
    $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('A new responses to your ticket ')
                    ->line('Your ticket has been updated ,please visit account to reply')
                    ->action('View Ticket', url(route('tickets.show',['id'=>$this->data['id']])))
                    ->line('Thank, '.config('app.name'));  
    }

     /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return 
        [
            'title' =>'A new reponse to your ticket #'.$this->data['ticket_id'],
            'created_at'=>$this->data['created_at'],
            'ticket_id'=>$this->data['ticket_id']
        ];
    }
}
