<?php

namespace Larastory;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LarastoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/larastory.php', 'larastory');
    }

    public function boot()
    {
        // Only load in a local environment for now
        if (!app()->environment(['local', 'testing'])) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/larastory.php' => config_path('larastory.php'),
        ], 'larastory-config');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'larastory');

        $this->registerRoutes();
    }

    protected function registerRoutes()
    {
        Route::group([
            'domain' => config('larastory.subdomain', 'larastory') . '.{domain}',
            'middleware' => ['web'],
            'namespace' => 'Larastory\Http\Controllers',
        ], function () {
            Route::get('/', 'LarastoryController@index')->name('larastory.index');
            Route::get('/component/{component}', 'LarastoryController@component')->name('larastory.component');
        });
    }
}