<?php

namespace App\Filament\Widgets;


use App\Models\Order;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Carbon;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class OrdersChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'ordersStatistics';
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $pollingInterval = '360s';
    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Orders Statistics';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    public ?string $filter = 'today';

    protected function getOptions(): array
    {
        $data = Trend::model(Order::class)
         ->query(  
            Order::query()
        )
        ->between(
            // start: now()->startOfYear(),
            // end: now()->endOfYear(),
            start: Carbon::parse($this->filterFormData['date_start']), 
            end: Carbon::parse($this->filterFormData['date_end']), 
        )
        ->perDay()
        ->count();
        $canceled = Trend::model(Order::class)
         ->query(  
            Order::query()->where('status','canceled')
        )
        ->between(
            start: Carbon::parse($this->filterFormData['date_start']), 
            end: Carbon::parse($this->filterFormData['date_end']), 
        )
        ->perDay()
        ->count();
        $completed = Trend::model(Order::class)
         ->query(  
            Order::query()->where('status','completed')
        )
        ->between(
            start: Carbon::parse($this->filterFormData['date_start']), 
            end: Carbon::parse($this->filterFormData['date_end']), 
        )
        ->perDay()
        ->count();
        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Completed Orders',
                    'data' =>  $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'name' => 'Canceled Orders',
                    'data' =>  $canceled->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'name' => 'Completed Orders',
                    'data' =>  $completed->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'xaxis' => [
                'categories' => $data->map(fn (TrendValue $value) => $value->date),
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1','red','green'],
            'stroke' => [
                'curve' => 'smooth',
            ],
        ];
    }
    // protected function getFilters(): ?array
    // {
    //     return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    // }
    protected function getFormSchema(): array
    {
        return [
            DatePicker::make('date_start')
                ->default(now()->subMonth()),
            DatePicker::make('date_end')
                ->default(now()),
        ];
    }
}
