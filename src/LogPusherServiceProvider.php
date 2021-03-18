<?php

namespace LogPusher;

use Illuminate\Support\ServiceProvider;

class LogPusherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('log_pusher', function ($app) {
            return new PushLog($app);
        });
    }

    public function boot()
    {
        $this->publishes([dirname(__DIR__) . '/config' => $this->app->configPath()], 'log_pusher');
    }
}
