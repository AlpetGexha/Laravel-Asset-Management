<?php

namespace App\Filament\Resources\PeriphelResource\Pages;

use App\Filament\Resources\PeriphelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriphel extends EditRecord
{
    protected static string $resource = PeriphelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
