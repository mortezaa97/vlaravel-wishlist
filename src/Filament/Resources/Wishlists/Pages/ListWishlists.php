<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\WishlistResource;

class ListWishlists extends ListRecords
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
