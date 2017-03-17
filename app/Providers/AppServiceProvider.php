<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('greater_than', function($attribute, $value, $parameters){ 
            $other = $parameters[0];
            return intval($value) > intval($other);
        });
        Validator::extend('less_than', function($attribute, $value, $parameters){ 
            $other = $parameters[0];
            return intval($value) < intval($other);
        });


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
