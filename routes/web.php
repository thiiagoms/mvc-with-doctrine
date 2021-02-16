<?php

$routes = [
    'animes' => [
        'create-anime' => 'create',
        'delete-anime' => 'delete',
        'list-animes' => 'index',
        'store-anime' => 'store',
        'update-anime' => 'update'
        
    ],
    'user' => [
        'login' => 'login',
        'auth' => 'auth',
        'create-user' => 'create',
        'store-user' => 'store'
    ]
];

return $routes;
