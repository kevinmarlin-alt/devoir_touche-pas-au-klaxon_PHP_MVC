<?php

use App\Controllers\TravelController;
use App\Controllers\LoginController;
use Buki\Router\Router;

$router = new Router();

$router->get('/', function () {
    (new TravelController)->index();
});

$router->get('/logout', function () {
    
    (new LoginController)->logout();
});

$router->get('/login', function () {
    (new LoginController)->index();
});

$router->post('/',function () {
    (new LoginController)->login();
    
});


$router->run();  