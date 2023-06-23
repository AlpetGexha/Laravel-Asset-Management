<?php

namespace App\Filament\Resources\ProvaiderResource\RelationManagers;

use App\Enums\HardwareStatus;
use App\Enums\HardwareType;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HardwareRelationManager extends RelationManager
{
    protected static string $relationship = 'hardware';

    protected static ?string $recordTitleAttribute = 'model';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('make')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial')
                    ->label('Serial Number')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->label('Status')
                    ->options(HardwareStatus::options()),
                Forms\Components\TextInput::make('os_name')
                    ->label('Opereanting System Name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('os_version')
                    ->label('Opereanting System Version')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ram')
                    ->label('RAM')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpu')
                    ->label('CPU')
                    ->maxLength(255),
                Select::make('type')
                    ->label('Type of Hardware')
                    ->options(HardwareType::options()),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('provaider_id')
                    ->relationship('provaider', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('purchased_at')
                    ->required(),
                Forms\Components\Toggle::make('current')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        Column::configureUsing(function (Column $column): void {
            $column
                ->toggleable()
                ->searchable()
                ->sortable();
        });

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('make'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('os_version'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\IconColumn::make('current')
                    ->boolean(),
                Tables\Columns\TextColumn::make('purchased_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
