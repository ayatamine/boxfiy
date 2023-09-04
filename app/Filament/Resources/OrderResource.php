<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'icons.order';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Select::make('service_id')
                //     ->relationship('service', 'id')
                //     ->required(),
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'name')
                //     ->required(),
                // Forms\Components\TextInput::make('order_number'),
                // Forms\Components\TextInput::make('link')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('amount')
                //     ->required(),
                // Forms\Components\TextInput::make('price')
                //     ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        Order::$CREATED => 'Pending',
                            Order::$PROCESSING => 'Processing',
                            Order::$PARTIAL => 'Partial',
                            Order::$COMPLETED => 'Completed',
                            Order::$CANCELED => 'Canceled',
                    ]),
            ]);
    }
    public static function canCreate():bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service.name')->limit(70)->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('order_number')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('link')->limit(35)->sortable()->searchable(),
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
                        ->getStateUsing(function (Order $record): string {
                          if($record->service->data_source =="manual") return  Str::lower($record->status);
                          return "Load State";
                        })
                        ->action(function (Order $record): void {
                           
                        }),
                // ViewColumn::make('status')->view('filament.tables.columns.order_status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }    
}
