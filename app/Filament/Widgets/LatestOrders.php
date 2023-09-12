<?php

namespace App\Filament\Widgets;

use Closure;
use Carbon\Carbon;
use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    protected static ?int $sort = 8;
    protected int | string | array $columnSpan ='full';
    protected function getTableQuery(): Builder
    {
        return Order::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('service.name')->limit(70)->sortable()->searchable()
            ->url(fn (Order $record): string =>route('filament.resources.services.view',$record->service_id))
            ->openUrlInNewTab(),

            Tables\Columns\TextColumn::make('user.name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('order_number')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('link')->limit(20)->sortable()->searchable()
                    ->url(fn (Order $record): string => $record->link)
                    ->openUrlInNewTab(),
            Tables\Columns\TextColumn::make('amount')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('price')->sortable()->searchable(),
            
            Tables\Columns\BadgeColumn::make('status')->sortable()->searchable()
                    ->enum([
                        Order::$CREATED => 'Pending',
                        Order::$PROCESSING => 'Processing',
                        Order::$PARTIAL => 'Partial',
                        Order::$COMPLETED => 'Completed',
                        Order::$CANCELED => 'Canceled',
                    ])
                    ->colors([
                        'primary' => static fn ($state): bool => $state === Order::$CREATED,
                        'warning' => static fn ($state): bool => $state ===  Order::$PROCESSING,
                        '#c8df63' => static fn ($state): bool => $state === Order::$PARTIAL,
                        'success' => static fn ($state): bool => $state === Order::$COMPLETED,
                        'danger' => static fn ($state): bool => $state ===  Order::$CANCELED,
                    ])
        ];
    }
    protected function getTableFilters(): array
    {
        return [
            Filter::make('created_at')
            ->form([
                DatePicker::make('from'),
                DatePicker::make('until'),
            ])
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        $data['from'],
                        fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                    )
                    ->when(
                        $data['until'],
                        fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                    );
            })
            ->indicateUsing(function (array $data): array {
                $indicators = [];
         
                if ($data['from'] ?? null) {
                    $indicators['from'] = 'Created from ' . Carbon::parse($data['from'])->toFormattedDateString();
                }
         
                if ($data['until'] ?? null) {
                    $indicators['until'] = 'Created until ' . Carbon::parse($data['until'])->toFormattedDateString();
                }
         
                return $indicators;
            })
        ];
    }
}
