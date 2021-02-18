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
        'auth-login' => 'auth',
        'logout' => 'logout'
    ]
];

return $routes;
