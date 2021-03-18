<?php

namespace LogService\Drivers;

interface Driver
{
    public function connect();

    public function push($data, $split);
}
