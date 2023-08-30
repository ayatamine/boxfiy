<?php

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

if(!function_exists('generate_avatar')){
    function generate_avatar($name): string
    {
        return "https://ui-avatars.com/api/?name=$name&background=0D8ABC&color=fff";
    }
}

if(!function_exists('fullName')){
    function fullName(): string
    {
        return  auth()->user()->name;
    }
}
if(!function_exists('markNotificationsAsRead')) {
    function markNotificationsAsRead($with_notify = true)
    {
        try {
            $notifications = auth()->user()->unreadNotifications->markAsRead();
            if($with_notify)
            {
            Notification::make()
                    ->title('All Notifications Marked as read successfully')
                    ->icon('heroicon-o-check-circle')
                    ->iconColor('success')
                    ->send();
            }
            return back();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
if(!function_exists('markSingleNotificationsAsRead')){
    function markSingleNotificationsAsRead($id,$with_notify=true)
    {
        try {
            DB::table('notifications')->where('id',$id)->update(['read_at'=>Carbon::now()]);
            if($with_notify) {
                Notification::make()
                        ->title('Notification Marked as read successfully')
                        ->icon('heroicon-o-check-circle')
                        ->iconColor('success')
                        ->send();
            }
            return back();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
if(!function_exists('DayTime'))
{
    function DayTime()
    {
        // Get the current time as a DateTime object
        $current_time = new DateTime();

        // Define morning and evening time ranges as DateTime objects
        $morning_start = DateTime::createFromFormat('H:i:s', '00:00:00'); // 6:00 AM
        $morning_end = DateTime::createFromFormat('H:i:s', '11:59:59');   // 11:59 AM
        $evening_start = DateTime::createFromFormat('H:i:s', '12:00:00'); // 6:00 PM
        $evening_end = DateTime::createFromFormat('H:i:s', '23:59:59');   // 11:59 PM

        // Check if it's morning
        if ($current_time >= $morning_start && $current_time <= $morning_end) {
            return "Good morning!";
        } 
        // Check if it's evening
        elseif ($current_time >= $evening_start && $current_time <= $evening_end) {
            return 'Good evening!';
        } 
        // If it's not morning or evening, it's daytime
        // else {
        //     echo "It's daytime!";
        // }

    }
}