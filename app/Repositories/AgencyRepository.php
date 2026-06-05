<?php
namespace App\Repositories;

use App\Core\Database;
use PDO;

class AgencyRepository {
    private PDO $pdo;
    
    public function __construct(
    ) {
        $this->pdo = Database::getConnection();
    }

    public function findAll(): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM agencies"
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function findById(int $id): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM agencies WHERE id = :id"
        );

        $query->execute([
            ':id' => $id
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function createAgency(string $city): void {
        $query = $this->pdo->prepare(
            "INSERT INTO agencies(city) VALUES (:city)"
        );

        $query->execute([
            ':city' => $city
        ]);
    }

    public function updateAgency(int $id, string $city): void {
        $query = $this->pdo->prepare(
            "UPDATE agencies SET city = :city WHERE id = :id"
        );

        $query->execute([
            ':id' => $id,
            ':city' => $city
        ]);
    }
    
    public function deleteAgency(int $id): void {
        $query = $this->pdo->prepare(
            "DELETE FROM agencies WHERE id = :id"
        );

        $query->execute([
            ':id' => $id
        ]);
    }
}