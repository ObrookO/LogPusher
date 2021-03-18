<?php


namespace LogPusher\Facades;


use Illuminate\Support\Facades\Facade;

class Pusher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'log_pusher';
    }
}
