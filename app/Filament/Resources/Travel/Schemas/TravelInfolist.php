<?php

namespace App\Filament\Resources\Travel\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TravelInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('firstName')
                    ->placeholder('-'),
                TextEntry::make('lastName')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-'),
                TextEntry::make('passportNumber')
                    ->placeholder('-'),
                TextEntry::make('passportExpiry')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('emergencyContact')
                    ->placeholder('-'),
                TextEntry::make('emergencyPhone')
                    ->placeholder('-'),
                TextEntry::make('medicalInfo')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('roomPreference')
                    ->placeholder('-'),
                TextEntry::make('specialRequests')
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
