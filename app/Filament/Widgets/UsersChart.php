<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class UsersChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'usersChart';
    protected static ?int $sort = 6;
    protected int | string | array $columnSpan = 3;
    protected static ?string $pollingInterval = '360s';
    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Users details';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $blocked_users =  User::where('account_status',false)->count();
   
        $active_users = User::where('account_status',true)->count();
        $online_users = User::where('is_admin',false)->where('last_seen', '>=', now()->subMinutes(5))->count();

        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => [
              $online_users,$active_users,$blocked_users
            ],
            'labels' => ['Online Users', 'Active Users', 'Suspended Users'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
