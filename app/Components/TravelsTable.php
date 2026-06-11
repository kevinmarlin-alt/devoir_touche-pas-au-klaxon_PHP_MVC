<?php
namespace App\Components;

use App\Services\TravelService;

class TravelsTable {

    static function renderAvailableTravels($scope = ''): void {
        $travels = (new TravelService)->getAvailableTravels();
        require __DIR__."/../Views/Travel/index.php";
    }

    static function renderAllTravels($scope = ''): void {
        $travels = (new TravelService)->getAllTravels();
        require __DIR__."/../Views/Travel/index.php";
    }
}