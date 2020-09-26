<?php

namespace App\Providers;

use App\Dep;
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
        $this->app->singleton('\App\Dep', function(){
            $dep = new Dep();
            return $dep;
        });

        $this->app->bind('\App\Example', function(){
            $dep = $this->app->make('\App\Dep');
            return new \App\Example($dep, rand(100,10000));
        });



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
