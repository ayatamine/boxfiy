<?php

namespace App\Filament\Resources\AccountDegreeResource\Pages;

use App\Filament\Resources\AccountDegreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccountDegrees extends ListRecords
{
    protected static string $resource = AccountDegreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
