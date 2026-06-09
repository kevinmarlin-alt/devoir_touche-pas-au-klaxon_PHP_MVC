<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\EmployeeService;
use App\Models\Employee;
use App\Services\AgencyService;

class AdminController extends Controller {

    public function index() {
        $employees = (new EmployeeService)->getAllEmployees();
        $agencies = (new AgencyService)->getAllAgencies();
        $this->render(
            '/Dashboard/dashboard',
            compact('employees', 'agencies')
        );
    }
}