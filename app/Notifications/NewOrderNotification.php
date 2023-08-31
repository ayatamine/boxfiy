<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
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
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->line('A new order has been submitted by '.auth()->user()->name)
                ->line('OrderId: ' . $this->data['id'])
                ->line('Total Amount: ' . $this->data['price'].'$')
                // ->line('Content: ' . $this->content)
                ->action('View Order', url(route('filament.resources.tickets.index')))
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
            'title' =>'New order submitted #'.$this->data['id'],
            'order'=>$this->data
        ];
    }
}
