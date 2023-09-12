<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Service;
use Carbon\Carbon;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
class DashboardOverview extends BaseWidget
{
    // protected static string $view = 'filament.widgets.dashboard-overview';
    protected static ?string $pollingInterval = '360s';

    protected function getCards(): array
    {
    
        $users_today = User::whereDate('created_at',Carbon::today())->count();
        return [
            Card::make('Total Users',User::count() )
            ->icon('heroicon-s-users')
            ->description($users_today.' Joined Today')
            ->descriptionColor('white')
            ->url(route('filament.resources.users.index'))
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
            Card::make('Total Services',Service::count())
            ->icon('icons.services')
            ->description('View Details')
            ->descriptionColor('white')
            ->url(route('filament.resources.services.index'))
            ->extraAttributes(['new-card-design'=>true,'blue-fonc-card'=>true])
            ->descriptionIcon('icons.arrow-right'),
            Card::make('Total Orders',Order::count() )
            ->icon('icons.order')
            ->description('View Details')
            ->descriptionColor('white')
            ->url(route('filament.resources.orders.index'))
            ->extraAttributes(['new-card-design'=>true,'open-red-card'=>true])
            ->descriptionIcon('icons.arrow-right'),
        ];
    }
}
