<?php

namespace Larastory;

use Illuminate\Support\Facades\Log;
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
        // Debug output
        Log::info('Larastory ServiceProvider boot() called');

        // Only load in local environment for now
        if (!app()->environment(['local', 'testing'])) {
            Log::info('Larastory: Not loading (not local environment)');
            return;
        }

        Log::info('Larastory: Loading in local environment');

        $this->publishes([
            __DIR__ . '/../config/larastory.php' => config_path('larastory.php'),
        ], 'larastory-config');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'larastory');

        $this->registerRoutes();

        Log::info('Larastory: Routes registered');
    }

    protected function registerRoutes()
    {
        // Get the current domain for local development
        $currentDomain = request()->getHost();
        $subdomain = config('larastory.subdomain', 'larastory');

        // For local development, be more specific about the domain
        if (app()->environment(['local', 'testing'])) {
            // Match the exact subdomain for local development
            Route::group([
                'domain' => $subdomain . '.' . $currentDomain,
                'middleware' => ['web'],
            ], function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });
        }

        // Also register with wildcard for production
        Route::group([
            'domain' => $subdomain . '.{domain}',
            'middleware' => ['web'],
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }
}