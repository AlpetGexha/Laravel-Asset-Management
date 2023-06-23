<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('personal_company')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner.name')
                    ->label('Creator'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('personal_company')
                    ->label('Personal Company')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                // filter by personal_id
                Tables\Filters\SelectFilter::make('personal_company')
                    ->label('Personal Comapany')
                    ->options([
                        'true' => 'Personal Company',
                        'false' => 'Not Personal Company',
                    ]),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Users')
                    ->options(function () {
                        return \App\Models\User::all()->pluck('name', 'id');
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCompanies::route('/'),
            // 'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
