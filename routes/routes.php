<?php

use App\Controllers\FormController;
use App\Controllers\IndexController;
use App\RestApi\Controllers\FormControllerRest;
use App\Http\Router;

$router = new Router();

$router->add('get', '/', IndexController::class, 'index');
$router->add('get', '/forms', FormController::class, 'index');
$router->add('get', '/forms/view', FormController::class, 'view');
//$router->add('get', '/forms/update', FormController::class, 'update');
$router->add('post', '/forms/update', FormController::class, 'updateForm');
$router->add('post', '/forms/create', FormController::class, 'create');
$router->add('get', '/forms/delete', FormController::class, 'delete');

//RestAPI routes

$router->add('get', '/api/v1/forms', FormControllerRest::class, 'index');
$router->add('get', '/api/v1/forms/view', FormControllerRest::class, 'view');
$router->add('put', '/api/v1/forms/update', FormControllerRest::class, 'update');
$router->add('post', '/api/v1/forms/create', FormControllerRest::class, 'create');
$router->add('delete', '/api/v1/forms/delete', FormControllerRest::class, 'delete');

return $router;
