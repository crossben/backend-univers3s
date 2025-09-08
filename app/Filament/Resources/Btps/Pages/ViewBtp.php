<?php

namespace App\Filament\Resources\Btps\Pages;

use App\Filament\Resources\Btps\BtpResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBtp extends ViewRecord
{
    protected static string $resource = BtpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
