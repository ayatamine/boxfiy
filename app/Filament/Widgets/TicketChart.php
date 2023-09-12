<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TicketChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'ticketChart';
    protected static ?int $sort = 7;
    protected int | string | array $columnSpan = 2;
    protected static ?string $pollingInterval = '360s';
    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Ticket';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $pending_tickets =  Ticket::where('status','pending')->count();
        $open =  Ticket::where('status','open')->count();
        $closed =  Ticket::where('status','closed')->count();
        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => [$pending_tickets,$open,$closed],
            'labels' => ['Pending tickets','Open Tickets','finished Tickets'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
