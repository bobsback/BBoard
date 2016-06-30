<?php

namespace App\Providers;

use App\Invite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;


class LaravelLoggerProxy {
    public function log( $msg ) {
        Log::info($msg);
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Invite::saving(function($invite)
        {
            $invite->access_key = str_random(60);
        });
        $pusher = $this->app->make('pusher');
        $pusher->set_logger( new LaravelLoggerProxy() );


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
