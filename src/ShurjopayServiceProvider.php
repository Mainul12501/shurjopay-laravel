<?php

namespace mainul\Shurjopay;

use Illuminate\Support\ServiceProvider;

class ShurjopayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/routes.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('mainul\Shurjopay\ShurjopayService');
        $this->app->make('mainul\Shurjopay\ShurjopayController');
        $this->publishes([
            __DIR__ . '/config/Shurjopay.php' =>  config_path('Shurjopay.php'),
        ], 'ma-config');
    }
}
