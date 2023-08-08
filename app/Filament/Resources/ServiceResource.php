<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {   
        
        
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('name')->label('Package Name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                    // ...
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('category_id')
                    ->searchable()
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required()
                    ->columnSpan('full'),
                    // ...
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('min_qte')->label('Min Quantity')
                    ->numeric(),
                    Forms\Components\TextInput::make('max_qte')->label('Max Quantity')
                    ->numeric(),
                    // ...
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('status')
                    ->options(['active' => __('Active'),'unactive'=>__('Inactive')])
                    ->columnSpan('full')
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('quality')->label(__('Quality'))
                    ->options(['normal' => __('Normal'),'medium'=>__('Medium'),'excellent'=>__('Excellent')])
                    ->columnSpan('full'),
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('partial_process')->label(__('Partial Process'))
                    ->options([1 => __('Active'),0=>__('InActive')])
                    ->columnSpan('full')
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Radio::make('data_source')->label(__('Data Source'))
                    ->options([
                        'manual' => 'Manual',
                        'api' => 'API'
                    ])
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('api_id')->label(__('Provider Name'))
                    ->searchable()
                    ->options(Category::all()->pluck('name', 'id')),
                    Forms\Components\TextInput::make('api_service_id')->label(__('Service Id')),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }    
}
