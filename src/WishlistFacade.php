<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist;

use Illuminate\Support\Facades\Facade;

/**
 * @see Skeleton\SkeletonClass
 */
class WishlistFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wishlist';
    }
}
