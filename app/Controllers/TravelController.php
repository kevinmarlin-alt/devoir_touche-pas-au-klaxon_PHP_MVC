<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\AgencyService;
use App\Services\EmployeeService;
use App\Services\TravelService;


class TravelController extends Controller {

public function indexCreate(): void {
        $id = $_SESSION['user']['id'];
        $employee = (new EmployeeService)->getEmployeeById($id);
        $agencies = (new AgencyService)->getAllAgencies();
        $this->render('Travel/create', compact('employee', 'agencies'));
    }

    public function indexUpdate(int $id): void {
        $travel = (new TravelService)->getTravelById($id);
        $agencies = (new AgencyService)->getAllAgencies();
        $this->render('Travel/update', compact('travel', 'agencies'));
    }

    public function createNewTravel(): void {
        $_POST['seats_available'] = $_POST['seats_total'];
        (new TravelService)->createTravel($_POST);
        header('Location: /');
    }

    public function updateTravel(int $id, array $data): void {
        $_SESSION['data'] = $data;
        (new TravelService)->updateTravel($id, $data);
        $_SESSION['banner'] = "Les modifications du trajet ont bien été enregistrées !";
    }

}