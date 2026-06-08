<?php
namespace App\Services;

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
      
        $employees = $this->employeeRepository->findAll();

        if(!$employees) {
            throw new Exception("Il n'y a pas d'employés pour le moment.");
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
}