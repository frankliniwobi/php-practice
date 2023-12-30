<?php

return [
    'database' => [
        'host' => env('DB_HOST', 'localhost'),
        'port' => env('DB_PORT', 3306),
        'dbname' => env('DB_NAME', ''),
        'charset' => 'utf8mb4'
    ],

    'username' => env('DB_USER', 'root'),
    'password' => env('DB_PASSWORD', '')
];