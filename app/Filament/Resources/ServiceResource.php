<?php

namespace App\Filament\Resources;

use Closure;
use App\Models\Api;
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

    protected static ?string $navigationIcon = 'icons.services';

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
                    ->numeric()
                    ->minValue(1),
                    Forms\Components\TextInput::make('max_qte')->label('Max Quantity')
                    ->numeric()
                    ->minValue(1),
                    // ...
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('price')->numeric()->minValue(1)->required(),
                    Forms\Components\Select::make('status')
                    ->options(['active' => __('Active'),'unactive'=>__('Inactive')])
                    ->required(),
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('quality')->label(__('Quality'))
                    ->options(['normal' => __('Normal'),'medium'=>__('Medium'),'excellent'=>__('Excellent')])
                    ->required(),
                    Forms\Components\Select::make('rate')->label(__('Rate( ex= 1000 )'))
                    ->options([1 => 'Per 1',1000=>'Per 1000'])
                    ->required(),
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('partial_process')->label(__('Partial Process'))
                    ->options([1 => __('Active'),0=>__('InActive')])
                    ->required()
                    ->columnSpan('full')
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Radio::make('data_source')->label(__('Data Source?'))
                    ->options([
                        'manual' => 'Manual',
                        'api' => 'API'
                    ])
                    ->required()
                    ->inline()
                    ->reactive()
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Select::make('api_id')->label(__('Provider Name'))
                    ->searchable()
                    ->options(Api::latest()->pluck('name', 'id'))
                    ->hidden(fn (Closure $get) => $get('data_source') !== 'api'),
                    Forms\Components\TextInput::make('api_service_id')->label(__('Service Id'))
                    ->hidden(fn (Closure $get) => $get('data_source') !== 'api'),
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('description')->label(__('Short Description'))
                    ->columnSpanFull()
                ]),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('avg_time')->label('Average Time(ex = "12 min"'),
                    Forms\Components\FileUpload::make('image')->label('Image')
                    ->directory('services')
                    ->image()
                    ->maxSize(2500)
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('400'),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Package Name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('min_qte')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('max_qte')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('quality')->searchable()->sortable(),
                Tables\Columns\ToggleColumn::make('partial_process'),
                
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
            // 'view' => Pages\ViewService::route('/{record}'),
        ];
    }    
}
