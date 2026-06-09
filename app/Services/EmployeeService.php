<?php
namespace App\Services;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Exception;

class EmployeeService {
    private EmployeeRepository $employeeRepository;
    public function __construct(
        
    )
    { 
        $this->employeeRepository = new EmployeeRepository();
    }

    public function getAllEmployees(): array {
      
        $result = $this->employeeRepository->findAll();
        $employees = [];
        foreach($result as $employee) {
            array_push(
                $employees, 
                new Employee(
                    $employee['id'],
                    $employee['firstname'],
                    $employee['lastname'],
                    $employee['phone'],
                    $employee['email'],
                    $employee['role']
                )
            );
        }

        return $employees;

    }

    public function getEmployeeById(int $id): array {
        $employee = $this->employeeRepository->findById($id);

        if(!$employee) {
            throw new Exception("L'employé sélèctionné n'existe pas.");
        }
        return $employee;
    }

    public function getEmployeeByEmail(string $email): array {
        $employee = $this->employeeRepository->findByEmail($email);

        if(!$employee) {
            throw new Exception("L'employé sélèctionné n'existe pas.");
        }
        return $employee;
    }

    public function hashAndUpdatePassword(string $email, string $password): void {
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $this->employeeRepository->updatePasswordByEmail($email, $passwordHashed);
    }
}

