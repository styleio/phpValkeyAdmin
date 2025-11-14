<?php
// Simple configuration for phpValkeyAdmin
// You can define multiple servers. The first entry is the default.
// Copy/adjust values to match your environment.

return [
    'servers' => [
        [
            'name'    => 'Local Valkey',
            'host'    => '127.0.0.1',
            'port'    => 6379,
            // 'password' => 'yourpassword', // uncomment if needed
            'database'=> 0,
            'timeout' => 1.5,
            // 'tls'   => false, // not supported in socket fallback; phpredis may use tls via scheme
        ],
        // Add more servers as needed(AWS Sample)
        // [
        //     'name'    => 'AWS Valkey',
        //     'host'    => 'tls://XXXXX.serverless.apne1.cache.amazonaws.com', //AWS prepends tls: to the beginning.
        //     'port'    => 6379,
        //     'database' => 0, //In AWS, selecting anything other than 0 will result in an error.
        //     'timeout' => 5.0,
        //     'tls'   => true,
        // ],
    ],
    // UI and behavior
    'page_size'   => 100,   // keys per page when scanning
    'scan_count'  => 200,   // hint for SCAN COUNT
    'allow_flush' => true,  // enable FLUSHDB action
    // i18n
    'default_language' => 'en',
    'languages_path'   => __DIR__ . '/languages',
    // UI
    'ui_v2' => true,
];
