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

function incomeStats()
{
    return \App\Models\Survey::selectRaw('monthly_income_range, count(id) as total')
        ->groupBy('monthly_income_range')
        ->orderBy('monthly_income_range')
        ->pluck('total', 'monthly_income_range')
        ->toArray();
}

function wivesStats()
{
    return \App\Models\Survey::selectRaw('wives, count(id) as total')
        ->groupBy('wives')
        ->orderBy('wives')
        ->pluck('total', 'wives')
        ->toArray();
}

function allowWivesStats()
{
    return \App\Models\Survey::selectRaw('allow_wife_to_visit_a_bank, count(id) as total')
        ->groupBy('allow_wife_to_visit_a_bank')
        ->orderBy('allow_wife_to_visit_a_bank')
        ->pluck('total', 'allow_wife_to_visit_a_bank')
        ->toArray();
}

function occupationalStats()
{
    return \App\Models\Survey::selectRaw('occupation, count(id) as total')
        ->groupBy('occupation')
        ->orderBy('occupation')
        ->pluck('total', 'occupation')
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
function replaceBoolean(array $array): array
{
    $mapping = [
        null => 'Nil',
        0 => 'NO',
        1 => 'YES'
    ];

    foreach ($array as &$value) {
        if (array_key_exists($value, $mapping)) {
            $value = $mapping[$value];
        }
    }

    return $array;
}
function wifeNumbers(array $array): array
{
    $mapping = [
        null => 'No answer',
        0 => 'No Wife',
        1 => '1 Wife',
        2 => '2 Wives',
        3 => '3 Wives',
        4 => '4 Wives',
        5 => '5 Wives',
        6 => '6 Wives',
        7 => '7 Wives',
        8 => '8 Wives',
        9 => '9 Wives',
        10 => '10 Wives',
    ];

    foreach ($array as &$value) {
        if (array_key_exists($value, $mapping)) {
            $value = $mapping[$value];
        }
    }

    return $array;
}
