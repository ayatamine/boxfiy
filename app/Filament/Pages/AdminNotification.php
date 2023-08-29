<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
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

    public function markAllAsRead(){
        markNotificationsAsRead();
        Notification::make()
                    ->title('All Notification marked as read successfully')
                    ->icon('heroicon-o-document-text') 
                    ->iconColor('success') 
                    ->send();
        return back();
    }
}
