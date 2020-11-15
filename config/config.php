<?php

return [
    'database' => [
        'dbname' => 'mvc',
        'username' => 'user',
        'password' => 'password',
        'driver' => 'mysql',
        'host' => 'db_mvc',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],
    'DEBUG' => true,
];
