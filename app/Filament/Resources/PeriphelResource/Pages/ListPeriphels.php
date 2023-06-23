<?php

namespace App\Filament\Resources\PeriphelResource\Pages;

use App\Filament\Resources\PeriphelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriphels extends ListRecords
{
    protected static string $resource = PeriphelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
