<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\LatestTransactions;

class LatestTransaction extends Page
{
    protected static ?string $navigationIcon = 'icons.transaction';
    protected static ?string $navigationLabel = 'Latest Transactions';
    protected  ?string $heading = 'Latest Transactions';
    protected static string $view = 'filament.pages.latest-transaction';

    protected function getHeaderWidgets(): array
    {
        return [
            LatestTransactions::class
        ];
    }
}
