<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mortezaa97\Wishlist\Filament\Resources\Wishlists\WishlistResource;

class WishlistPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'wishlist';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'WishlistResource' => WishlistResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
