<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BubbleTeaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BubbleTeaInterfaceRepository::class, BubbleTeaSessionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
