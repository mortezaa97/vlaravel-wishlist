<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Wishlist\Http\Controllers\WishlistController;

Route::prefix('api')->middleware('api')->group(function () {
    Route::get('wishlists', [WishlistController::class, 'index'])->name('wishlists.index');
    Route::get('wishlists/{wishlist}', [WishlistController::class, 'show'])->name('wishlists.show');
    Route::post('wishlists', [WishlistController::class, 'store'])->name('wishlists.store');
});
