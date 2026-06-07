<?php

use App\Controllers\TravelController;
use Buki\Router\Router;

$router = new Router();

$router->get('/', function () {
    (new TravelController)->showAllTravels();
});


$router->run();