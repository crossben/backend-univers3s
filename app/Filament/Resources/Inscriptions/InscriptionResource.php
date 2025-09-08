<?php

namespace App\Filament\Resources\Inscriptions;

use App\Filament\Resources\Inscriptions\Pages\CreateInscription;
use App\Filament\Resources\Inscriptions\Pages\EditInscription;
use App\Filament\Resources\Inscriptions\Pages\ListInscriptions;
use App\Filament\Resources\Inscriptions\Pages\ViewInscription;
use App\Filament\Resources\Inscriptions\Schemas\InscriptionForm;
use App\Filament\Resources\Inscriptions\Schemas\InscriptionInfolist;
use App\Filament\Resources\Inscriptions\Tables\InscriptionsTable;
use App\Models\Inscription;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InscriptionResource extends Resource
{
    protected static ?string $model = Inscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Inscription';

    public static function form(Schema $schema): Schema
    {
        return InscriptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InscriptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInscriptions::route('/'),
            'create' => CreateInscription::route('/create'),
            'view' => ViewInscription::route('/{record}'),
            'edit' => EditInscription::route('/{record}/edit'),
        ];
    }
}
