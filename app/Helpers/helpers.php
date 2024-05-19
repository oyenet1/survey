<?php

use Filament\Widgets\StatsOverviewWidget\Stat;

function stateStats(): array
{
    return [Stat::make('Average time on page', '3:12')];
}

function agentStats()
{
    return \App\Models\User::where('role', 'enumerator')
        ->selectRaw('users.name, COUNT(surveys.id) as total')
        ->leftJoin('surveys', 'users.id', '=', 'surveys.user_id')
        ->groupBy('users.id')
        ->pluck('total', 'name')
        ->toArray();
}
function ageRangeStats()
{
    return \App\Models\Survey::selectRaw('age_range, count(id) as total')
        ->groupBy('age_range')
        ->orderBy('age_range')
        ->pluck('total', 'age_range')
        ->toArray();
}
function educationStats()
{
    return \App\Models\Survey::selectRaw('education, count(id) as total')
        ->groupBy('education')
        ->orderBy('education')
        ->pluck('total', 'education')
        ->toArray();
}

// function getRange(array $dat): array
// {
//     $lst = [
//         0 => '18 - 25',
//         1 => '25 - 30',
//         2 => '31 - 39',
//         3 => '40 - 49',
//         4 => '50 - 59',
//         5 => '60 & above',
//     ];

//     $res = [];
//     foreach ($dat as $value) {
//         if (array_key_exists($value, $lst)) {
//             array_push($res, $lst[$value]);
//         }
//     }
//     return $res;
// }

// function getRange(array $dat): array
// {
//     $lst = [
//         0 => '18 - 25',
//         1 => '25 - 30',
//         2 => '31 - 39',
//         3 => '40 - 49',
//         4 => '50 - 59',
//         5 => '60 & above',
//     ];

//     return array_intersect_key($lst, array_flip($dat));
// }

function replaceValue(array $array): array
{
    $mapping = [
        0 => '18 - 25',
        1 => '25 - 30',
        2 => '31 - 39',
        3 => '40 - 49',
        4 => '50 - 59',
        5 => '60 & above',
    ];

    foreach ($array as &$value) {
        if (array_key_exists($value, $mapping)) {
            $value = $mapping[$value];
        }
    }

    return $array;
}
