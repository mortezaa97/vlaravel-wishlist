<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\WishlistResource;

class CreateWishlist extends CreateRecord
{
    protected static string $resource = WishlistResource::class;
}
