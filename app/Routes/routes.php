<?php

use App\Controllers\TravelController;
use App\Controllers\LoginController;
use App\Middlewares\AuthMiddleware;
use Buki\Router\Router;

$router = new Router();

$router->get('/', function () {
    (new TravelController)->index();
});

$router->get('/logout', function () {
    AuthMiddleware::handle();
    (new LoginController)->logout();
});

$router->get('/login', function () {
    (new LoginController)->index();
});

$router->post('/',function () {
    (new LoginController)->login();
    
});

$router->delete('/travels/:id', function (int $id): void {
    AuthMiddleware::handle();
    (new TravelController)->deleteTravel($id);
});


$router->run();  