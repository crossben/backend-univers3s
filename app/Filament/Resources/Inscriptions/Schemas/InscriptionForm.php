<?php

namespace App\Filament\Resources\Inscriptions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class InscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('studentName')
                    ->required(),
                TextInput::make('studentAge')
                    ->numeric(),
                TextInput::make('parentName')
                    ->required(),
                TextInput::make('parentPhone')
                    ->required(),
                TextInput::make('parentEmail')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('level')
                    ->required(),
                TextInput::make('previousSchool'),
                Textarea::make('medicalInfo')
                    ->columnSpanFull(),
                Toggle::make('acceptTerms')
                    ->required(),
            ]);
    }
}
