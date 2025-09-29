<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Wishlist\Http\Controllers\ToggleWishlistController;
use Mortezaa97\Wishlist\Http\Controllers\WishlistController;

Route::prefix('api/wishlists')->middleware('api')->group(function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlists.index');
    Route::get('/{wishlist}', [WishlistController::class, 'show'])->name('wishlists.show');
    Route::post('toggle', ToggleWishlistController::class)->name('wishlists.toggle');
});
