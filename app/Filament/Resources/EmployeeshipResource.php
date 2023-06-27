<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeshipResource\Pages;
use App\Models\Employeeship;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EmployeeshipResource extends Resource
{
    protected static ?string $model = Employeeship::class;

    protected static ?string $navigationIcon = 'heroicon-o-emoji-happy';

    protected static ?string $navigationGroup = 'company';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'editor' => 'Editor',
                        'viewer' => 'Viewer',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')->visible(auth()->user()->isSuperAdmin()),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListEmployeeships::route('/'),
            // 'create' => Pages\CreateEmployeeship::route('/create'),
            'edit' => Pages\EditEmployeeship::route('/{record}/edit'),
        ];
    }
}
