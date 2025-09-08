<?php

namespace App\Filament\Resources\Btps\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BtpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('projectType'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('budget'),
                TextInput::make('timeline'),
            ]);
    }
}
