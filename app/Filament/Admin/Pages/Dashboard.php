<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StudentCount;
use App\Filament\Widgets\GroupCount;
use App\Filament\Widgets\GroupPayment;


class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    public function getTitle(): string
    {
        return 'Boshqaruv paneli';
    }

    public function getHeading(): string
    {
        return 'Xush kelibsiz, Admin!';
    }
    public function getWidgets(): array
    {
        return [
            StudentCount::class,
            GroupCount::class,
            GroupPayment::class,
        ];
    }
}
