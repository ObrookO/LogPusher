<?php
return [
    'default' => env('PUSH_LOG_DRIVER', 'redis'),

    'channels' => [
        'redis' => [
            'host' => env('PUSH_LOG_REDIS_HOST', 'localhost'),
            'port' => env('PUSH_LOG_REDIS_PORT', '6379'),
            'password' => env('PUSH_LOG_REDIS_PASSWORD', null),
            'queue' => env('PUSH_LOG_REDIS_LIST', 'log_list')
        ]
    ]
];
