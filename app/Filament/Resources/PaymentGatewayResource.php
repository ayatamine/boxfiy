<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentGatewayResource\Pages;
use App\Filament\Resources\PaymentGatewayResource\RelationManagers;
use App\Models\PaymentGateway;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\Toggle::make('status')
                    ->required(),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
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
