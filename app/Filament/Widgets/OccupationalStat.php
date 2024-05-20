<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class OccupationalStat extends ChartWidget
{
    public $data;
    protected static ?string $maxHeight = '450px';
    protected static ?int $sort = 8;
    protected static ?string $heading = 'Occupational Stat';

    protected function getData(): array
    {
        $this->data = occupationalStats();
        return [
            'datasets' => [
                [
                    // 'label' => 'Occupation',
                    'data' => array_values($this->data),
                    'backgroundColor' => [
                        '#2ecc71', // Green
                        '#f74c3c', // Red
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
            'labels' => array_map('strtoupper', array_keys($this->data)),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
                        drawBorder:false
                    },
                    ticks:{
                        stepSize:1,

                    },
                    gridLines: {
                    display: false // Hide the horizontal grid lines
                    }
                },
                x: {
                    grid: {
                        // callback: (value) => '€' + value,
                        drawTicks:false
                    },
                    gridLines: {
                    display: false // Hide the horizontal grid lines
                    },
                    ticks:{
                        stepSize:1,
                        drawTicks:false,
                    },
                },
            },
            indexAxis: 'y'
        }
    JS);
    }
}
