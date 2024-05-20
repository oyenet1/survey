<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class IncomeStat extends ChartWidget
{
    public $data;
    protected static ?string $maxHeight = '450px';
    protected static ?int $sort = 5;
    protected static ?string $heading = 'Monthly Income Stat';

    protected function getData(): array
    {
        $this->data = incomeStats();
        return [
            'datasets' => [
                [
                    'label' => 'Monthly Income',
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
                    'barPercentage' => .8,

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
            }
        }
    JS);
    }
}
