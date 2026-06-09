<?php
namespace App\Repositories;

use App\Core\Database;
use PDO;

class EmployeeRepository {
    private PDO $pdo;
    
    public function __construct(
    ) {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM employees"
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function findById(int $id): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM employees WHERE id = :id"
        );

        $query->execute([
            ':id' => $id
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail(int $email): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM employees WHERE email = :email"
        );

        $query->execute([
            ':email' => $email
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function findPasswordByEmail(string $email): array {
        $query = $this->pdo->prepare(
            "SELECT passeword FROM employee WHERE email = :email"
        );

        $query->execute([':email' => $email]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePasswordByEmail(string $email, string $password): void {
        $query = $this->pdo->prepare(
            "UPDATE employees SET passeword = :passeword  WHERE email = :email"
        );

        $query->execute([
            ':email' => $email,
            ':passeword' => $password
        ]);
    }
}