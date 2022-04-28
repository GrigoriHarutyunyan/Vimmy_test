<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Services\Users\UsersServiceInterface::class, \App\Services\Users\UsersService::class);
        $this->app->bind(\App\Services\Posts\PostsServiceInterface::class, \App\Services\Posts\PostsService::class);

    }
}
