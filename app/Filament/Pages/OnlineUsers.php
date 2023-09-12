<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;

class OnlineUsers extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.online-users';

    public $notification_title,$notification_content;
    protected static bool $shouldRegisterNavigation = false;
    protected function getViewData(): array
    {
       $users = User::paginate(10);
       return [
        'users'=>$users
       ];
    }
    protected function getActions(): array
    {
        return [];
        // return [
        //     Action::make('Send Notification')->color('primary')
        //     ->action(function (array $data): void {
               
        //         $doctors = Doctor::with('specialities:id,name')->with('sub_specialities:id,name')->whereNotificationStatus(true)->get();
        //         $delay = now()->addMinutes(2);
        //         Notification::send($doctors, (new OnlineDoctorNotification($data))->delay($delay));

        //         viewNotification::make()
        //                     ->title('Notifications send successfully to doctors')
        //                     ->success() 
        //                     ->duration(5000) 
        //                     ->send();
        //     })
        //     ->form([
        //         Forms\Components\TextInput::make('notification_title')
        //         ->required()
        //         ->label(trans('notification_title'))
        //         ->maxLength(150),
        //         Forms\Components\Textarea::make('notification_content')
        //             ->required()
        //             ->columnSpan('full')
        //             ->maxLength(16777),
                    
        //     ])
        // ];
    }
}
