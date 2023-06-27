<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyInvitationResource\Pages;
use App\Filament\Resources\CompanyInvitationResource\RelationManagers;
use App\Models\CompanyInvitation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyInvitationResource extends Resource
{
    protected static ?string $model = CompanyInvitation::class;
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-mail-open';

    protected static ?string $navigationGroup = 'company';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                \pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyInvitations::route('/'),
            'create' => Pages\CreateCompanyInvitation::route('/create'),
            // 'edit' => Pages\EditCompanyInvitation::route('/{record}/edit'),
        ];
    }
}
