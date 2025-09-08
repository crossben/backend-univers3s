<?php

namespace App\Filament\Resources\Emails\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('service')
                    ->required(),
            ]);
    }
}
