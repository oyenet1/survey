<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class AgeRangeStat extends ChartWidget
{
    public $data;
    protected static ?string $maxHeight = '350px';
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Surveys by Age Range';


    protected function getData(): array
    {
        $this->data = ageRangeStats();
        return [
            'datasets' => [
                [
                    'label' => 'Age Range',
                    'data' => array_values($this->data),
                    'backgroundColor' => [
                        '#e67e22', // Orange
                        '#1abc9c',
                        '#2ecc71', // Green
                        '#e74c3c', // Red
                        '#9b59b6', // Purple
                        '#f1c40f', // Yellow
                        '#3498db', // Blue
                    ],
                    // 'backgroundColor' => ['red', '#03df0f', ''],
                    'borderColor' => 'white',
                    // 'categoryPercentage' => 0.1,
                    'borderWidth' => 3,
                    // 'barPercentage' => 1,

                ],
            ],
            'labels' => replaceValue(array_keys($this->data)),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
    {
        scales: {
            y: {
                grid: {
                    // callback: (value) => '€' + value,
                    drawOnChartArea:false,
                    offset:false,
                    drawTicks:false,
                },
                ticks:{
                    display:false
                },
            },
            x:{
                ticks:{
                    // stepSize:1,
                    display:false
                },
            }
        },
    }
JS);
    }
}
