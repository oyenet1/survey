<?php

namespace App\Filament\Resources\LgaResource\Pages;

use App\Filament\Resources\LgaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLgas extends ListRecords
{
    protected static string $resource = LgaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
