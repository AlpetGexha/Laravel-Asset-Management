<?php

namespace App\Filament\Resources\CompanyInvitationResource\Pages;

use App\Filament\Resources\CompanyInvitationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyInvitation extends EditRecord
{
    protected static string $resource = CompanyInvitationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
