<?php

namespace App\Filament\Widgets;

use Closure;
use Carbon\Carbon;
use Filament\Tables;
use App\Models\Order;
use App\Models\BallanceHistory;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Illuminate\Support\Facades\Request;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTransactions extends BaseWidget
{
    protected int | string | array $columnSpan ='full';
    public static function canView(): bool
    {
        return Request::segment(2) == "latest-transaction";
    }
    protected function getTableQuery(): Builder
    {  
        return BallanceHistory::with('user:id,name,email')
        ->with('paymentGateway:id,name')
        ->whereNot('transaction_type',BallanceHistory::$PURSHASE)
        ->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')->limit(70)->sortable()->searchable()
            ->url(fn (BallanceHistory $record): string =>route('filament.resources.users.view',$record->user->id))
            ->openUrlInNewTab(),

            Tables\Columns\TextColumn::make('user.email')
            ->label('Email')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('amount')->view('filament.tables.columns.price-column')
            ->label('Amount')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('paymentGateway.name')
            ->label('Payment Method')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('transaction_type')->view('filament.tables.columns.transaction-type-column')
            ->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')->date()->sortable()->searchable(),
            
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
