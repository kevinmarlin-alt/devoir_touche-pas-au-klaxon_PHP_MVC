<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AdminController;
use App\Middlewares\AdminMiddleware;
use App\Middlewares\AuthMiddleware;
use Buki\Router\Router;
use App\Core\Controller;

$router = new Router();

$router->get('/', function () {
    (new HomeController)->index();
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

$router->post('/travels/create', function () {
    AuthMiddleware::handle();
    (new HomeController)->createNewTravel();
});

$router->delete('/travels/:id', function (int $id): void {
    AuthMiddleware::handle();
    (new HomeController)->deleteTravel($id);
});

$router->get('/dashboard', function () {
    AuthMiddleware::handle();
    AdminMiddleware::handle();

    (new AdminController)->index();

});

$router->notFound(function () {
    require __DIR__."/../Views/Layouts/404.php";
});


$router->run();  