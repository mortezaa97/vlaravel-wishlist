<?php

namespace Mortezaa97\Wishlist;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Wishlist\Skeleton\SkeletonClass
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
