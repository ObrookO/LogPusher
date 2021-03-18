<?php

namespace LogPusher;


use LogPusher\Drivers\RedisDriver;

class PushLog
{
    protected $app;
    protected $config;
    protected $driver;

    /**
     * LogService constructor.
     * @param $app
     * @throws \Exception
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->setConfig();
        $this->setDriver();
    }

    /**
     * Set Config Data.
     */
    protected function setConfig()
    {
        $this->config = $this->app['config']['log_pusher'];
    }

    /**
     * Set Driver.
     * @throws \Exception
     */
    protected function setDriver()
    {
        $driverName = $this->getDefaultDriver();
        $driverMethod = 'create' . ucfirst($driverName) . 'Driver';
        if (!method_exists($this, $driverMethod)) {
            throw new \Exception("Driver [{$driverName}] is not supported.");
        }

        $config = $this->config['channels'][$driverName];
        if (empty($config)) {
            throw new \Exception("'{$driverName}' of channels is missing.");
        }

        $this->driver = $this->{$driverMethod}($config);
    }

    /**
     * Get Default Driver.
     * @return mixed
     */
    protected function getDefaultDriver()
    {
        return $this->config['default'];
    }

    /**
     * Create Redis Driver.
     * @param $config
     * @return RedisDriver
     */
    protected function createRedisDriver($config)
    {
        $config['client'] = $this->app['config']['database.redis.client'];
        return new RedisDriver($this->app, $config);
    }

    /**
     * Push Log.
     * @param $data
     * @param bool $split Split data into multi parts.
     */
    public function push($data, $split = false)
    {
        $this->driver->push($data, $split);
    }
}
