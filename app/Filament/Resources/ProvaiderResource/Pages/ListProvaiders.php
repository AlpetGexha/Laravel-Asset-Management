<?php

namespace App\Filament\Resources\ProvaiderResource\Pages;

use App\Filament\Resources\ProvaiderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvaiders extends ListRecords
{
    protected static string $resource = ProvaiderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
