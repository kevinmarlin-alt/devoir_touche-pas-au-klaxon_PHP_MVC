<?php
namespace App\Controllers;

use App\Services\TravelService;

class TravelController {

    public function index() {
        echo "Great !";
    }

    public function showAllTravels(): void {
        $services = new TravelService();

        $travels = $services->getAllTravels();

        require __DIR__."/../Views/home.php";
        var_dump($travels);

    }
}

