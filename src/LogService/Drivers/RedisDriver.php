<?php

namespace LogService\Drivers;


use Illuminate\Redis\RedisManager;

class RedisDriver implements Driver
{
    private $app;
    private $config;
    private $redis;

    /**
     * RedisDriver constructor.
     * @param $app
     * @param $config
     */
    public function __construct($app, $config)
    {
        $this->app = $app;
        $this->config['default'] = $config;
        $this->connect();
    }

    /**
     * Connect to redis.
     */
    public function connect()
    {
        if (is_null($this->redis)) {
            $this->redis = new RedisManager($this->app, $this->config['client'] ?? 'predis', $this->config);;
        }
    }

    /**
     * Push data to list.
     * @param $data
     * @param bool $split Split data into multi parts.
     * @throws \Exception
     */
    public function push($data, $split = false)
    {
        $list = $this->config['default']['queue'] ?? '';
        if (empty($list)) {
            throw new \Exception('Queue is required.');
        }

        $splitData = is_array($data) && !$split ? json_encode($data) : $data;
        $this->redis->lpush($list, $splitData);
    }
}
