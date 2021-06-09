<?php

return [
    'password' => [
        'admin' => env('ADMIN_PASSWORD'),
    ],
    'roles' => [
        'admin' => 'admin',
        'user' => 'user',
    ],
    'emails' => [
        'dev' => env('DEV_EMAIL'),
    ]
];
