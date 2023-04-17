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
        \Laravel\Sanctum\Sanctum::ignoreMigrations();
        $this->app->bind(
            \App\Repositories\MovieRepository::class,
            \App\Repositories\EloquentMovieRepository::class,
        );

        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
