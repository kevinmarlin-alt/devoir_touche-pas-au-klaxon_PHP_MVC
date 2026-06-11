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

    public function createNewTravel(): void {
        $data = [
            'departure_agency_id' => $_POST['departure_agency_id'],
            'arrival_agency_id' => $_POST['arrival_agency_id'],
            'departure_at' => $_POST['departure_at'],
            'arrival_at' => $_POST['arrival_at'],
            'seats_total' => $_POST['seats_total'],
            'seats_available' => $_POST['seats_total'],
            'employee_id' => $_POST['employee_id']
        ];
        (new TravelService)->createTravel($data);
        header('Location: /');

    }

}