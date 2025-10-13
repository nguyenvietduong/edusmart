<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $services = [
            'App\Services\BaseService',
            'App\Interfaces\Services\ImageServiceInterface'     => 'App\Services\ImageService',
            'App\Interfaces\Services\LocationServiceInterface'  => 'App\Services\LocationService',
            'App\Interfaces\Services\RoleServiceInterface'      => 'App\Services\RoleService',
        ];

        foreach ($services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') != 'local') {
            $this->app['request']->server->set('HTTPS', true);
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
        Blade::component('admin.component.modal', 'admin-modal');
    }
}
