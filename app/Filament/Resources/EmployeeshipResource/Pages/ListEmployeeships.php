<?php

namespace App\Filament\Resources\EmployeeshipResource\Pages;

use App\Filament\Resources\EmployeeshipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployeeships extends ListRecords
{
    protected static string $resource = EmployeeshipResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
