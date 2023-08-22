<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiResource\Pages;
use App\Filament\Resources\ApiResource\RelationManagers;
use App\Models\Api;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApiResource extends Resource
{
    protected static ?string $model = Api::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationIcon = 'icons.code';
    protected static ?string $navigationLabel = 'Api Providers List';
    public static function form(Form $form): Form
    {
        return $form  
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                        ->unique(table: Api::class,ignoreRecord:true)
                        ->required()
                        ->maxLength(255)
                        ->columnSpan('full'),
                        // ...
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('url')
                        ->required()
                        ->columnSpan('full'),
                        // ...
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('key')
                        ->required()
                        ->columnSpan('full'),
                        // ...
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Toggle::make('status')
                        ->columnSpan('full'),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Textarea::make('description')
                        ->columnSpan('full'),
                    ]),
                
               
               
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Api Provider Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('url')->limit(50)->searchable()->sortable(),
                Tables\Columns\TextColumn::make('key')->limit(50)->searchable()->sortable(),
                Tables\Columns\ToggleColumn::make('status')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListApis::route('/'),
            // 'create' => Pages\CreateApi::route('/create'),
            'edit' => Pages\EditApi::route('/{record}/edit'),
        ];
    }    
}
