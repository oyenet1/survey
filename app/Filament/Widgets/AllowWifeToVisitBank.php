<?php

namespace App\Filament\Widgets;

use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class AllowWifeToVisitBank extends ChartWidget
{
    public $data;
    protected static ?string $maxHeight = '450px';
    protected static ?int $sort = 7;
    protected static ?string $heading = 'Man who allow their wife to visit bank';

    protected function getData(): array
    {
        $this->data = allowWivesStats();
        return [
            'datasets' => [
                [
                    'label' => 'Visit Bank',
                    'data' => array_values($this->data),
                    // 'backgroundColor' => [
                    //     '#e74c3c', // Red
                    //     '#10a5b6', //
                    // ],
                    'backgroundColor' => ['red', '#03df0f'],
                    'borderColor' => 'white',
                    // 'categoryPercentage' => 0.1,
                    'borderWidth' => 3,
                    // 'barPercentage' => 1,

                ],
            ],
            'labels' => replaceBoolean(array_keys($this->data)),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
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
