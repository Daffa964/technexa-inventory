<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\InventoryStatsWidget;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard Inventaris PT TechNexa';

    public function getWidgets(): array
    {
        return [
            InventoryStatsWidget::class,
        ];
    }
}