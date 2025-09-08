<?php

namespace App\Filament\Resources\Inscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('studentName')
                    ->searchable(),
                TextColumn::make('studentAge')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('parentName')
                    ->searchable(),
                TextColumn::make('parentPhone')
                    ->searchable(),
                TextColumn::make('parentEmail')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('level')
                    ->searchable(),
                TextColumn::make('previousSchool')
                    ->searchable(),
                IconColumn::make('acceptTerms')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
