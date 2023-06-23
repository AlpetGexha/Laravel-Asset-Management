<?php

namespace App\Filament\Resources;

use App\Enums\HardwareStatus;
use App\Enums\HardwareType as EnumsHardwareType;
use App\Filament\Resources\HardwareResource\Pages;
use App\Filament\Resources\HardwareResource\RelationManagers;
use App\Models\Hardware;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use HardwareType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HardwareResource extends Resource
{
    protected static ?string $model = Hardware::class;

    protected static ?string $navigationGroup = 'bookmark';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                    ->options(EnumsHardwareType::options()),
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('provaider.name'),
                Tables\Columns\TextColumn::make('make'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('serial'),
                Tables\Columns\TextColumn::make('os_name'),
                Tables\Columns\TextColumn::make('os_version'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('ram'),
                Tables\Columns\TextColumn::make('cpu'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\IconColumn::make('current')
                    ->boolean(),
                Tables\Columns\TextColumn::make('purchased_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListHardware::route('/'),
            'create' => Pages\CreateHardware::route('/create'),
            'edit' => Pages\EditHardware::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
