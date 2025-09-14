<?php

namespace Mortezaa97\Wishlist;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Wishlist\Policies\WishlistPolicy;

class WishlistServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load routes
//        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        Gate::policy(\Mortezaa97\Wishlist\Models\Wishlist::class, WishlistPolicy::class);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('stories.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'wishlist');

        // Register the main class to use with the facade
        $this->app->singleton('wishlist', function () {
            return new Wishlist;
        });
    }
}
