<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\AgencyController;
use App\Controllers\TravelController;

use App\Middlewares\AdminMiddleware;
use App\Middlewares\AuthMiddleware;

use Buki\Router\Router;
use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;

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

$router->group('/travels', function($router) {

    $router->get('/create', function() {
        AuthMiddleware::handle();
        (new TravelController)->indexCreate();
    });

    $router->post('/create', function() {
        AuthMiddleware::handle();
        (new TravelController)->createNewTravel();
    });
});

$router->group('/agencies', function($router) {

    $router->get('/create', function() {
        AdminMiddleware::handle();
        (new AgencyController)->indexCreate();
    });

    $router->get('/update/:id', function(int $id) {
        AdminMiddleware::handle();
        (new AgencyController)->indexUpdate($id);
    });
    
    $router->post('/create', function() {
        AdminMiddleware::handle();
        (new AgencyController)->createNewAgency();
    });

    $router->put('/:id', function(Request $request, int $id): void {
        AdminMiddleware::handle();
        $content = $request->getContent();
        $data = json_decode($content, true);
        
        (new AgencyController)->updateAgency($id, $data);

    });

    $router->delete('/:id', function(int $id): void {
        AdminMiddleware::handle();
        (new AgencyController)->deleteAgency($id);
    });

});

// $router->post('/travels/create', function () {
//     AuthMiddleware::handle();
//     (new HomeController)->createNewTravel();
// });

$router->delete('/travels/:id', function (int $id): void {
    AuthMiddleware::handle();
    (new HomeController)->deleteTravel($id);
});

$router->get('/dashboard', function () {
    AuthMiddleware::handle();
    AdminMiddleware::handle();

    (new DashboardController)->index();

});

$router->notFound(function () {
    require __DIR__."/../Views/404.php";
});


$router->run();  