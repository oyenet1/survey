<?php

namespace App\Filament\Resources\LgaResource\Pages;

use App\Filament\Resources\LgaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLga extends EditRecord
{
    protected static string $resource = LgaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
