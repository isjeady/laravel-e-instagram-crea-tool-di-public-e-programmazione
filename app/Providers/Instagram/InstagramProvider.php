<?php

namespace App\Providers\Instagram;

use App\Services\InstagramLoggingService;
use Illuminate\Support\ServiceProvider;
use InstagramLogginService;

class InstagramProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
/*
        $this->app->bind('InstagramLogging' , function ($app){
            $instance =  new InstagramLoggingService;
            return $instance;
        });
*/
        /*
        $services = config("app.services");
        foreach ($services as $k=>$v){
            $this->app->bind($k, function ($app) use ($v){
                $instance =  new $v();
                //$instance->setCloudUser(\Auth::user());
                return $instance;
            });
        }
        */
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->singleton('InstagramLogging' , function ($app){
            $instance =  new InstagramLoggingService;
            return $instance;
        });

        /*
        $services = config("app.services");
        foreach ($services as $k=>$v){
            $this->app->singleton($k, function ($app) use ($v){
                $instance =  new $v();
                //$instance->setCloudUser(\Auth::user());
                return $instance;
            });
        }
        */
    }
}
