<?php
namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Repositories\LoginRepository;
use Exception;

class LoginService {
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository;
    }

    public function getEmplyeeByEmail(string $email) {
        return $this->loginRepository->findEmployeeByEmail($email);
       }

    public function checkPasswordIsEmpty(string $email): bool {
        $employeeRepository = new EmployeeRepository();
        $password = $employeeRepository->findPasswordByEmail($email);

        if($password === "") {
            return true;
        }

        return false;
    }
}