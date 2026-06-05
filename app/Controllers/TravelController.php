<?php
namespace App\Controllers;

use App\Services\TravelService;

class TravelController {

    public function showAvailableTravels(): void {

        $services = new TravelService();

        $travels = $services->getAllTravels();

        var_dump($travels);

    }
}

