<?php

namespace App\Filament\Resources\AccountDegreeResource\Pages;

use App\Filament\Resources\AccountDegreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccountDegree extends EditRecord
{
    protected static string $resource = AccountDegreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
