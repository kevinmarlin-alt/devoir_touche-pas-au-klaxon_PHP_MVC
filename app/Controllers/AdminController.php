<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\EmployeeService;
use App\Models\Employee;

class AdminController extends Controller {

    public function index() {
        $employees = (new EmployeeService)->getAllEmployees();
        $this->render(
            '/Dashboard/dashboard',
            compact('employees')
        );
    }
}