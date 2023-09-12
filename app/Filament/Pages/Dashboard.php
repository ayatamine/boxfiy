<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Pages\Dashboard as BasePage;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static bool $shouldRegisterNavigation =true;
    // protected static string $view = 'filament.pages.dashboard';
    protected function getColumns(): int | array
    {
        return [
            'md' => 4,
            'xl' => 5,
        ];
    }
}
