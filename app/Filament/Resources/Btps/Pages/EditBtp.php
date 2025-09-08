<?php

namespace App\Filament\Resources\Btps\Pages;

use App\Filament\Resources\Btps\BtpResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBtp extends EditRecord
{
    protected static string $resource = BtpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
