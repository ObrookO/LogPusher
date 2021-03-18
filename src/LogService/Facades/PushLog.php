<?php


namespace LogService\Facades;


use Illuminate\Support\Facades\Facade;

class PushLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'push_log';
    }
}
