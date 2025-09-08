<?php

namespace App\Filament\Resources\Inscriptions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InscriptionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('studentName'),
                TextEntry::make('studentAge')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('parentName'),
                TextEntry::make('parentPhone'),
                TextEntry::make('parentEmail'),
                TextEntry::make('address'),
                TextEntry::make('level'),
                TextEntry::make('previousSchool')
                    ->placeholder('-'),
                TextEntry::make('medicalInfo')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('acceptTerms')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
