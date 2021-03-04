<?php

namespace Irfa\HariLibur;

use Illuminate\Support\ServiceProvider;

class HariLiburServiceProvider extends ServiceProvider
{
    protected $namespace='AppLicenseServer\Controllers';
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         $this->publishes([
            __DIR__.'/../laravel-config/hari_libur.php' => config_path('irfa/hari_libur.php'), ], 'hari-libur');
    }
}
