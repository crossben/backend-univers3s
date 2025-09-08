<?php

namespace App\Filament\Resources\Inscriptions\Pages;

use App\Filament\Resources\Inscriptions\InscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInscription extends EditRecord
{
    protected static string $resource = InscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
