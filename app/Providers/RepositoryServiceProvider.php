<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
            'App\Interfaces\Repositories\LocationRepositoryInterface'   => 'App\Repositories\LocationRepositoryEloquent',
            'App\Interfaces\Repositories\RoleRepositoryInterface'       => 'App\Repositories\RoleRepositoryEloquent',
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap repositories.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}