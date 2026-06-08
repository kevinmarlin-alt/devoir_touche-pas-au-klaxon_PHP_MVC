<?php
namespace App\Services;

use App\Repositories\LoginRepository;
use Exception;

class LoginService {
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new LoginRepository;
    }

    public function getEmplyeeByEmail(string $email): array {
        $employee = $this->loginRepository->findEmployeeByEmail($email);

        if(!$employee) {
            throw new Exception("Email incorrect !");
        }

        return $employee;
    }
}