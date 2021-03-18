<?php

namespace LogService\Providers;

use Illuminate\Support\ServiceProvider;
use LogService\PushLog;

class LogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('push_log', function ($app) {
            return new PushLog($app);
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/config' => 'app/config'], 'push_log.config');
    }
}
