<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountDegreeResource\Pages;
use App\Filament\Resources\AccountDegreeResource\RelationManagers;
use App\Models\AccountDegree;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccountDegreeResource extends Resource
{
    protected static ?string $model = AccountDegree::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->unique(table: AccountDegree::class,ignoreRecord:true)
                    ->required()
                    ->maxLength(255)->columnSpan('full'),
                ]),
                Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Textarea::make('description')
                            ->columnSpan('full')
                ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('balance_from')->numeric(),
                        Forms\Components\TextInput::make('balance_to')->numeric()
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Repeater::make('properties')
                        ->schema([
                            Forms\Components\TextInput::make('property')->required()->columnSpan('full'),
                            // ...
                        ])
                    ]),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('balance_from')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('balance_to')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAccountDegrees::route('/'),
            'create' => Pages\CreateAccountDegree::route('/create'),
            'edit' => Pages\EditAccountDegree::route('/{record}/edit'),
        ];
    }    
}
