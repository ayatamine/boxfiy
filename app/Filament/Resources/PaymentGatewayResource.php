<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\PaymentGateway;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentGatewayResource\Pages;
use App\Filament\Resources\PaymentGatewayResource\RelationManagers;

class PaymentGatewayResource extends Resource
{
    protected static ?string $model = PaymentGateway::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icons.payment_card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unique_keyword')
                    ->required()
                    ->maxLength(255)
                    ->disabledOn('edit'),
                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Repeater::make('credentials')
                    ->schema([
                        Forms\Components\TextInput::make('name')->label('Name (ex=api_key,api_secret,pkey,...)')->required(),
                        Forms\Components\TextInput::make('value')->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                ]),
                Forms\Components\FileUpload::make('logo')
                ->directory('payment_gateways')
                ->image()
                ->maxSize(2500),
                Forms\Components\Textarea::make('short_description')
                    ->maxLength(16215),
                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('min_amount')
                    ->numeric(),
                    Forms\Components\TextInput::make('max_amount')
                    ->numeric()
                ]),
                //  Forms\Components\Select::make('is_attached_with_spaceremit')
                //     ->label('Attached With SpaceRemit')
                //     ->options([0 => 'Attached', 1 => 'Not Attached'])
                //     ->reactive(),
                 Forms\Components\Checkbox::make('is_attached_with_spaceremit')
                    ->label('Attached With SpaceRemit')
                    ->reactive(),
                 Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\RichEditor::make('how_to_pay_description')
                    ->label('How To Pay Description(it will be in different page)')
                    ->columnSpanFull()
                    ->hidden(
                        fn (Closure $get): bool => $get('is_attached_with_spaceremit') == true
                    ),
                ])
                // Forms\Components\Toggle::make('status')
                //     ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('unique_keyword'),
                Tables\Columns\ImageColumn::make('logo'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPaymentGateways::route('/'),
            'create' => Pages\CreatePaymentGateway::route('/create'),
            'edit' => Pages\EditPaymentGateway::route('/{record}/edit'),
        ];
    }    
}
