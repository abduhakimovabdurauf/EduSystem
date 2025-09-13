<?php

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.student.pages.dashboard';
    protected static ?string $title = 'Mening sahifam';

    public function getStudent()
    {
        return Auth::user();
    }
}
