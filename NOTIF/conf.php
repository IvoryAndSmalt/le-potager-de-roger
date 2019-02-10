<?php
$conf = [
    'db' => [
        'charset'=>'utf8',
        'name'=> getenv('DB_NAME'),
        'host'=>getenv('DB_HOST'),
        'login'=>getenv('DB_USER'),
        'passwd'=>getenv('DB_PASS'),
    ],
    'mongo' => [
        'host' => getenv('MONGO_HOST'),
        'name' => getenv('MONGO_NAME') ? getenv('MONGO_NAME') : 'roger',
    ],
    'mail' => [
        'smtphost' => 'ssl0.ovh.net',
    ],
    'search' => [
        'dist' => 30, // Distance en km
    ]
];