<?php

namespace App\Filament\Resources\ProvaiderResource\Pages;

use App\Filament\Resources\ProvaiderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProvaider extends EditRecord
{
    protected static string $resource = ProvaiderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
