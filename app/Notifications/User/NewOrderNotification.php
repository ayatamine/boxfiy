<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    public $service_name;
    public $order;
    
    public function __construct($service_name,$order)
    {
        $this->service_name = $service_name;
        $this->order = $order;
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
                ->line('Hi '.auth()->user()->name)
                ->line('Your Order on '.$this->service_name.' has been submitted ')
                ->line('Total Amount: ' . $this->order['price'].'$')
                ->line('Your balance has been debited by ' . $this->order['price'].'$')
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
            'title' =>'New order submitted #'.$this->order['id'],
            'created_at'=>$this->order['created_at']
        ];
    }
}
