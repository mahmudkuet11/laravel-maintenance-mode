<?php

namespace Mahmud\MaintenanceMode;

use Illuminate\Support\ServiceProvider;

class MaintenanceModeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/maintenance-mode.php', 'maintenance-mode'
        );
    }

    private function registerViews(){
        $this->loadViewsFrom(__DIR__.'/views', 'maintenance-mode');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/maintenance-mode'),
        ], 'maintenance-mode');
    }

    private function registerConfig(){
        $this->publishes([
            __DIR__.'/config/maintenance-mode.php' => config_path('maintenance-mode.php'),
        ], 'maintenance-mode');
    }
}
