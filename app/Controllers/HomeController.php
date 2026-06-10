<?php
namespace App\Controllers;

use App\Services\TravelService;
use App\Core\Controller;
use App\Models\Travel;
use App\Services\AgencyService;

class HomeController extends Controller {

    public function index(): void {
        $travelService = new TravelService();
        $travels = $travelService->getAvailableTravels();
        $agencyService = new AgencyService;
        $agencies = $agencyService->getAllAgencies();
        $this->render(
            'home', 
            compact('travels', 'agencies')
        );
    }

    public function deleteTravel(int $id) {
        (new TravelService())->deleteTravel($id);

    }

    // function createNewTravel
}