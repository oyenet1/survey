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
            Stat::make('FCT State', Survey::where('state_id', 7)->count()),
            Stat::make('Adamawa State', Survey::where('state_id', 1)->count()),
            Stat::make('Bauchi State', Survey::where('state_id', 2)->count()),
            Stat::make('Borno State', Survey::where('state_id', 3)->count()),
            Stat::make('Gombe State', Survey::where('state_id', 4)->count()),
            Stat::make('Taraba State', Survey::where('state_id', 5)->count()),
            Stat::make('Yobe State', Survey::where('state_id', 6)->count()),
            Stat::make('Male', Survey::where('gender', 'male')->count()),
            Stat::make('Female', Survey::where('gender', 'female')->count()),
            // Stat::make('Average time on page', '3:12'),
        ];
    }
}
