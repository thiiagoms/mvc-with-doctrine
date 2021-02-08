<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Http\Controllers\AnimesController;

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../routes/web.php';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

$classController = $routes[$path];
$controller = new AnimesController();
$controller->$classController();
