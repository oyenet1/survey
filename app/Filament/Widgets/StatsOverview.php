<?php

namespace App\Filament\Widgets;

use App\Models\Survey;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Surveys', Survey::count()),
            Stat::make('FCT Surveys', Survey::where('state_id', 7)->count()),
            Stat::make('Adamawa Surveys', Survey::where('state_id', 1)->count()),
            Stat::make('Bauchi Surveys', Survey::where('state_id', 2)->count()),
            Stat::make('Borno Surveys', Survey::where('state_id', 3)->count()),
            Stat::make('Gombe Surveys', Survey::where('state_id', 4)->count()),
            Stat::make('Taraba Surveys', Survey::where('state_id', 5)->count()),
            Stat::make('Yobe Surveys', Survey::where('state_id', 6)->count()),
            // Stat::make('Average time on page', '3:12'),
        ];
    }
}
