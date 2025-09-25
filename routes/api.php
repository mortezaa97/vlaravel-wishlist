<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Wishlist\Http\Controllers\WishlistController;

Route::prefix('api')->group(function () {
    Route::post('wishlists', [WishlistController::class, 'store'])->name('wishlists.store');
});
