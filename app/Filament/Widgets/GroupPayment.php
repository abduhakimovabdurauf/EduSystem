<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Group;

class GroupPayment extends Widget
{
    protected static string $view = 'filament.widgets.group-payments-widget';
    protected int|string|array $columnSpan = 'full';

    public function getGroups()
    {
        return Group::with(['students.payments'])->get();
    }
}
