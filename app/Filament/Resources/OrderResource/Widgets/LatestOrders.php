<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        // ...
    }

    protected function getTableColumns(): array
    {
        return [
            // ...
        ];
    }
}
