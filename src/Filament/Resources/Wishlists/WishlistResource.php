<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Filament\Resources\Wishlists;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages\CreateWishlist;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages\EditWishlist;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages\ListWishlists;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\Schemas\WishlistForm;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\Tables\WishlistsTable;
use Mortezaa97\Wishlist\Models\Wishlist;
use UnitEnum;

class WishlistResource extends Resource
{
    protected static ?string $model = Wishlist::class;

    protected static ?string $navigationLabel = 'علاقه مندی ها';

    protected static ?string $modelLabel = 'علاقه مندی';

    protected static ?string $pluralModelLabel = 'علاقه مندی ها';

    protected static string|null|UnitEnum $navigationGroup = 'بلاگ';

    public static function form(Schema $schema): Schema
    {
        return WishlistForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WishlistsTable::configure($table);
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
            'index' => ListWishlists::route('/'),
            'create' => CreateWishlist::route('/create'),
            'edit' => EditWishlist::route('/{record}/edit'),
        ];
    }
}
