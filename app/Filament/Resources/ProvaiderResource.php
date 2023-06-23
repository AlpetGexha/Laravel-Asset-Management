<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvaiderResource\Pages;
use App\Filament\Resources\ProvaiderResource\RelationManagers;
use App\Models\Provaider;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvaiderResource extends Resource
{
    protected static ?string $model = Provaider::class;

    protected static ?string $navigationGroup = 'bookmark';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProvaiders::route('/'),
            // 'create' => Pages\CreateProvaider::route('/create'),
            // 'edit' => Pages\EditProvaider::route('/{record}/edit'),
        ];
    }
}
