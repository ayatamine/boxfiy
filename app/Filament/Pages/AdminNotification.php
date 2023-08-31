<?php

namespace App\Filament\Pages;

use Exception;
use Carbon\Carbon;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class AdminNotification extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation =false;

    protected static string $view = 'filament.pages.admin-notification';
    protected function getViewData(): array
    {
       $notifications = Auth::user()->notifications;
   
       return [
        'notifications'=>$notifications
       ];
    }

    public function markNotificationsAsRead()
    {
        try {
            $notifications =auth()->user()->unreadNotifications->markAsRead();
            Notification::make()
                    ->title('Marked as read successfully')
                    ->icon('heroicon-o-document-text') 
                    ->iconColor('success') 
                    ->send();
            return back();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function markSingleNotificationsAsRead($id)
    {
        try {
            DB::table('notifications')->where('id',$id)->update(['read_at'=>Carbon::now()]);

            Notification::make()
                    ->title('Marked as read successfully')
                    ->icon('heroicon-o-document-text') 
                    ->iconColor('success') 
                    ->send();
            return back();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
