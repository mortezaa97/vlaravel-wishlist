<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Filament\Resources\Wishlists\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\WishlistResource;

class EditWishlist extends EditRecord
{
    protected static string $resource = WishlistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
