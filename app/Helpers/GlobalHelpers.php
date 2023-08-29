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