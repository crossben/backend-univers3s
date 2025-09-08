<?php

namespace App\Filament\Resources\Btps;

use App\Filament\Resources\Btps\Pages\CreateBtp;
use App\Filament\Resources\Btps\Pages\EditBtp;
use App\Filament\Resources\Btps\Pages\ListBtps;
use App\Filament\Resources\Btps\Pages\ViewBtp;
use App\Filament\Resources\Btps\Schemas\BtpForm;
use App\Filament\Resources\Btps\Schemas\BtpInfolist;
use App\Filament\Resources\Btps\Tables\BtpsTable;
use App\Models\Btp;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BtpResource extends Resource
{
    protected static ?string $model = Btp::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Btp';

    public static function form(Schema $schema): Schema
    {
        return BtpForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BtpInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BtpsTable::configure($table);
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
            'index' => ListBtps::route('/'),
            'create' => CreateBtp::route('/create'),
            'view' => ViewBtp::route('/{record}'),
            'edit' => EditBtp::route('/{record}/edit'),
        ];
    }
}
