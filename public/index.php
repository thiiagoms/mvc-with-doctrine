<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Http\Controllers\AnimesController;
use App\Http\Controllers\UserController;

$path = $_SERVER['PATH_INFO'];
$path = explode('/', $path);
$controller = $path[1];
$method = $path[2];

$routes = require __DIR__ . '/../routes/web.php';

if (!array_key_exists($controller, $routes)) {
	http_response_code(404);
    exit();
}

if ($controller === "animes") {
	$class = new AnimesController();
} else if ($controller === "users") {
	$class = new UserController();
} 

$classMethod = $routes[$controller][$method];
$class->$classMethod();
