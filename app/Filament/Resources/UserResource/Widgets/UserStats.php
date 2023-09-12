<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Carbon\Carbon;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserStats extends BaseWidget
{
    protected function getCards(): array
    {
    
        $users_today = User::whereDate('created_at',Carbon::today())->count();
        return [
            Card::make('Total Users',User::count() )
            ->icon('heroicon-s-users')
            ->description($users_today.' Joined Today')
            ->descriptionColor('white')
            // ->url(route('filament.resources.users.index'))
            ->extraAttributes(['new-card-design'=>true,'blue-card'=>true])
            ->descriptionIcon('icons.arrow-right'),
            // Card::make('Total Doctors',Doctor::count() )
            // ->icon('icons.doctor')
            // ->description('View Details')
            // ->descriptionColor('white')
            // ->url(route('filament.resources.doctors.index'))
            // ->extraAttributes(['new-card-design'=>true,'blue-fonc-card'=>true])
            // ->descriptionIcon('icons.arrow-right'),
            Card::make('Online Users',User::where('last_seen', '>=', now()->subMinutes(5))->count())
            ->icon('heroicon-o-users')
            ->description('View Details')
            ->descriptionColor('white')->color('success')
            ->url(route('filament.pages.online-users'))
            ->extraAttributes(['new-card-design'=>true,'open-green-card'=>true])
            ->descriptionIcon('icons.arrow-right'),
            Card::make('Banned Users',User::where('account_status',false)->count() )
            ->icon('heroicon-s-users')
            // ->description('View Details')
            ->descriptionColor('white')
            ->url(route('filament.resources.users.index'))
            ->extraAttributes(['new-card-design'=>true,'open-red-card'=>true])
            // ->descriptionIcon('icons.arrow-right'),
        ];
    }
}
