<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Kozak sprawa, dzieki komendzie ponizej moge stad podac jakies wazne 'dane' ktore beda wspoldzielone na wszystkich 'view'
        // View::share('key', 'value');
    }
}
