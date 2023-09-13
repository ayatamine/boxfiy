<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Filament\Widgets\Widget;
use App\Models\BallanceHistory;
use Filament\Forms\Components\DatePicker;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class NumbersStats extends BaseWidget
{

    protected static string $view = 'filament.widgets.numbers-stats';
    protected int | string | array $columnSpan = 'full';

    public $from,$to;
    protected function getViewData():array
    {
        return [
            'users'=>User::when($this->from,function($query){
                $query->whereDate('created_at', '>=', $this->from);
            })
            ->when($this->to,function($query){
                $query->whereDate('created_at', '<=', $this->to);
            })
            ->count(),
            'transactions'=>BallanceHistory::when($this->from,function($query){
                $query->whereDate('created_at', '>=', $this->from);
            })
            ->when($this->to,function($query){
                $query->whereDate('created_at', '<=', $this->to);
            })->count(),
            'orders'=>Order::when($this->from,function($query){
                $query->whereDate('created_at', '>=', $this->from);
            })
            ->when($this->to,function($query){
                $query->whereDate('created_at', '<=', $this->to);
            })->count(),
            'amount'=>Order::when($this->from,function($query){
                $query->whereDate('created_at', '>=', $this->from);
            })
            ->when($this->to,function($query){
                $query->whereDate('created_at', '<=', $this->to);
            })->whereStatus('completed')->sum('price'),
            'users_balance'=>User::when($this->from,function($query){
                $query->whereDate('created_at', '>=', $this->from);
            })
            ->when($this->to,function($query){
                $query->whereDate('created_at', '<=', $this->to);
            })->sum('wallet_balance'),
        ];
    }
    public function filterData()
    {
        $this->emit('refreshComponent');
    }
}
