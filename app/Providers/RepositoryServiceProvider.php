<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\Users\UsersRepositoryInterface::class, \App\Repositories\Users\UsersRepository::class);
        $this->app->bind(\App\Repositories\Posts\PostsRepositoryInterface::class, \App\Repositories\Posts\PostsRepository::class);
    }
}
