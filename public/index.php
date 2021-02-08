<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Http\Controllers\AnimesController;

switch($_SERVER['PATH_INFO']):

    case '/list-animes':
        $controlller = new AnimesController();
        $controlller->index();
        break;
    case '/create-anime':
        $controller = new AnimesController();
        $controller->create();
        break;
    case '/store-anime':
        $controller = new AnimesController();
        $controller->store();
    default:
        break;
endswitch;