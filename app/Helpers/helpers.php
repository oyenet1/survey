<?php

use Filament\Widgets\StatsOverviewWidget\Stat;

function stateStats(): array
{
    return [Stat::make('Average time on page', '3:12')];
}

function agentStats()
{
    return \App\Models\User::selectRaw('users.name, COUNT(surveys.id) as total')
        ->leftJoin('surveys', 'users.id', '=', 'surveys.user_id')
        ->groupBy('users.id')
        ->where('role', '!=', 'admin')
        ->pluck('total', 'name')
        ->toArray();
}
