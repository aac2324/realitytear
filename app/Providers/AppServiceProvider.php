<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
        //Gate::define('manage-as-host', fn(User $u) => $u->isHost() || $u->isAdmin());
        //Gate::define('manage-as-admin', fn(User $u) => $u->isAdmin());
