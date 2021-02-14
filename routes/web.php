<?php

$routes = [
    'animes' => [
        'list-animes' => 'index',
        'create-anime' => 'create',
        'store-anime' => 'store',
        'delete-anime' => 'delete'
    ],
    'user' => [
        'login' => 'auth',
        'create-user' => 'create',
        'store-user' => 'store'
    ]
];

return $routes;
