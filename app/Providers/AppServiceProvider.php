<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $timezone_offset_minutes = 330;
        $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
        date_default_timezone_set($timezone_name);
        config( ['app.datetime' => date('Y-m-d')] );
        config( ['app.timezone' => $timezone_name] );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
