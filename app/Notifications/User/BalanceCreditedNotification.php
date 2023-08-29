<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BalanceCreditedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $user;
    public $balance_history;
    
    public function __construct($user,$balance_history)
    {
         $this->user = $user;
         $this->balance_history = $balance_history;
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
                     ->line('Hi '.$this->user)
                     ->line('Your balance has been credited by '.$this->balance_history->amount.' dollars')
                    ->action('Go to dashboard', url(route('wallet')))
                    ->line('Thank, '.config('app.name')); 
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' =>'Your balance has been credited by '.$this->balance_history->amount,
            'created_at'=>$this->balance_history->created_at,
        ];
    }
}
