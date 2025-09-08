<?php

namespace App\Filament\Resources\Travel\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('firstName'),
                TextInput::make('lastName'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('address'),
                TextInput::make('passportNumber'),
                DatePicker::make('passportExpiry'),
                TextInput::make('emergencyContact'),
                TextInput::make('emergencyPhone'),
                Textarea::make('medicalInfo')
                    ->columnSpanFull(),
                TextInput::make('roomPreference'),
                Textarea::make('specialRequests')
                    ->columnSpanFull(),
                Toggle::make('acceptTerms')
                    ->required(),
            ]);
    }
}
