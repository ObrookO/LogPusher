<?php

namespace LogPusher\Drivers;

interface Driver
{
    public function connect();

    public function push($data, $split);
}
