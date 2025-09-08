<?php

namespace App\Filament\Resources\Btps\Pages;

use App\Filament\Resources\Btps\BtpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBtps extends ListRecords
{
    protected static string $resource = BtpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
