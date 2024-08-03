<?php


namespace App\Addons\Category;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/views', 'category');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    public function register()
    {
        // Register addon-specific bindings
    }
}
