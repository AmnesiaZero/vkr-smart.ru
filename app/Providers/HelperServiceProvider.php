<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $helpers = [
            'JsonHelper',
            'ValidatorHelper'
        ];

        foreach ($helpers as $helper) {
            require_once app_path() . '/Helpers/' . $helper . '.php';
        }
    }
}
