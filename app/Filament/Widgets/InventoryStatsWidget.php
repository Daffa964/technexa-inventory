<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Product;

class InventoryStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah total kategori dalam sistem')
                ->color('success')
                ->icon('heroicon-o-folder'),
            Stat::make('Total Barang', Product::count())
                ->description('Jumlah total barang dalam stok')
                ->color('primary')
                ->icon('heroicon-o-shopping-bag'),
        ];
    }
}