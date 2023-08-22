<?php

namespace App\Filament\Resources\TicketCategoryResource\Pages;

use App\Filament\Resources\TicketCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTicketCategories extends ManageRecords
{
    protected static string $resource = TicketCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
