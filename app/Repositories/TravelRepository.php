<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\Travel;
use PDO;

class TravelRepository {
    private PDO $pdo;
    
    public function __construct(
    ) {
        $this->pdo = Database::getConnection();
    }

    public function findAvailableTravels(): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM travels 
                WHERE seats_available > 0 AND departure_at > NOW()
                ORDER BY departure_at ASC"
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function findAllTravels(): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM travels 
                ORDER BY departure_at ASC"
        );

        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function findTravelById(int $id): array {
        $query = $this->pdo->prepare(
            "SELECT * FROM travels WHERE id = :id"    
        );

        $query->execute([
             ':id' => $id
         ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteTravel(int $id): void {
        $query = $this->pdo->prepare(
            "DELETE FROM travels WHERE id = :id"    
        );

        $query->execute([
             ':id' => $id
         ]);
    }

    public function updateTravel(Travel $travel): void {
        $query = $this->pdo->prepare(
            "UPDATE travels
            SET 
                departure_agency_id = :departure_agency_id,
                arrival_agency_id = :arrival_agency_id,
                departure_at = :departure_at,
                arrival_at = :arrival_at,
                seats_total = :seats_total,
                seats_available = :seats_available,
                employee_id = :employee_id           
            WHERE id = :id"    
        );

        $query->execute([
            ':id' => $travel->getId(),
            ':departure_agency_id' => $travel->getDepartureAgencyId(),
            ':arrival_agency_id' => $travel->getArrivalAgencyId(),
            ':departure_at' => $travel->getDeparturelAt(),
            ':arrival_at' => $travel->getArrivalAt(),
            ':seats_total' => $travel->getTotalSeats(),
            ':seats_available' => $travel->getAvaivableSeats(),
            ':employee_id' => $travel->getEmployeeId()
         ]);
    }

    public function createTravel(Travel $travel): void {
        $query = $this->pdo->prepare(
            "INSERT INTO travels(
                departure_agency_id,
                arrival_agency_id,
                departure_at,
                arrival_at,
                seats_total,
                seats_available,
                employee_id
            ) VALUES (
                :departure_agency_id,
                :arrival_agency_id,
                :departure_at,
                :arrival_at,
                :seats_total,
                :seats_available,
                :employee_id
            )"    
        );

        $query->execute([
                ':departure_agency_id' => $travel->getDepartureAgencyId(),
                ':arrival_agency_id' => $travel->getArrivalAgencyId(),
                ':departure_at' => $travel->getDeparturelAt(),
                ':arrival_at' => $travel->getArrivalAt(),
                ':seats_total' => $travel->getTotalSeats(),
                ':seats_available' => $travel->getAvaivableSeats(),
                ':employee_id' => $travel->getEmployeeId()
         ]);
    }
}
