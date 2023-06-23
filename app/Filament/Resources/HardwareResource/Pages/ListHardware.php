<?php

namespace App\Filament\Resources\HardwareResource\Pages;

use App\Filament\Resources\HardwareResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHardware extends ListRecords
{
    protected static string $resource = HardwareResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
