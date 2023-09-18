<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\BallanceHistory;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Notifications\User\BalanceCreditedNotification;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\UserStats;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $resource = User::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    public static function canCreate(): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)->disabled(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                // Forms\Components\DateTimePicker::make('email_verified_at'),
                // Forms\Components\TextInput::make('password')
                //     ->password()
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('username')
                            ->unique(table: User::class, ignoreRecord: true)
                            ->required()
                            ->maxLength(255)
                            ->disabled(),
                        Forms\Components\TextInput::make('wallet_balance')->numeric(),

                    ]),
                Forms\Components\Toggle::make('account_status'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Full Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('username')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
                // Tables\Columns\ImageColumn::make('thumbnail'),
                // Tables\Columns\IconColumn::make('verified_email')->label('Verified Email'),
                Tables\Columns\TextColumn::make('created_at')->label('Joined At')
                    ->date(),
                Tables\Columns\ToggleColumn::make('account_status')->label('Account Status'),
                Tables\Columns\TextColumn::make('wallet_balance')->label('Balance'),
                // ->action(
                //     Tables\Actions\Action::make('select')
                //         ->requiresConfirmation()
                //         ->action(function (User $record): void {
                //             $this->dispatchBrowserEvent('select-post', [
                //                 'post' => $record->getKey(),
                //             ]);
                //         }),
                // )

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('created_at')
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
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Action::make('Add Balance')
                ->action(function (User $record,array $data): void {
                    $record->increment('wallet_balance' ,$data['amount']);
                    $BallanceHistory = BallanceHistory::create(
                        [
                            'user_id'=>$record->id,
                            'transaction_type' =>BallanceHistory::$CB,
                            'amount' =>$data['amount'],
                            'payment_gateway_id'=>0,
                        ]
                        );
    
                        $record->notify(new BalanceCreditedNotification($record->name,$BallanceHistory));
                })
                ->color('warning')
                ->mountUsing(fn (Forms\ComponentContainer $form, User $record) => $form->fill([
                    'wallet_balance' => $record->wallet_balance,
                ]))
                ->form([
                    Forms\Components\TextInput::make('wallet_balance')->label('Current Balance')->numeric()->disabled(),
                    Forms\Components\TextInput::make('amount')->numeric()
                ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    protected function getHeaderWidgets(): array
    {
        return [
             UserStats::class
        ];
    }
}
