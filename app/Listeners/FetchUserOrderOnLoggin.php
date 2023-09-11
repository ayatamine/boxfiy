<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Jobs\fetchUserOrdersJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FetchUserOrderOnLoggin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
        $user =$event->user;
        dispatch(new fetchUserOrdersJob($user))->delay(now()->addMinutes(2));;
    }
}
