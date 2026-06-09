<?php
namespace App\Controllers;

use App\Services\TravelService;
use App\Core\Controller;
use App\Models\Travel;

class TravelController extends Controller {

    public function index(): void {
        $services = new TravelService();
        $travels = $services->getAvailableTravels();
        $this->render(
            'Home/home', 
            compact('travels')
        );
    }

    public function deleteTravel(int $id) {
        (new TravelService())->deleteTravel($id);

    }
}