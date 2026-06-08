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
            "SELECT 
                t.id,
                dep.city AS departure_agency,
                t.departure_at,
                arr.city AS arrival_agency,
                t.arrival_at,
                t.seats_available,
                t.seats_total,
                t.employee_id
            FROM travels t

            INNER JOIN agencies dep
                ON dep.id = t.departure_agency_id

            INNER JOIN agencies arr
                ON arr.id = t.arrival_agency_id

            WHERE t.seats_available > 0 AND t.departure_at > NOW()
            ORDER BY t.departure_at ASC"
        );

        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_CLASS);

        $travels = [];
        foreach($results as $item) {
            $travelTmp = new Travel(
                $item['id'],
                $item['departure_agency_id'],
                $item['arrival_agency_id'],
                $item['departure_at'],
                $item['arrival_at'],
                $item['seats_available'],
                $item['seats_total'],
                $item['employee_id']
            );
            array_push($travels, $travelTmp);
        };

        return $travels;
    }

    public function findAllTravels(): array {
        $query = $this->pdo->prepare(
            "SELECT 
                t.id,
                dep.city AS departure_agency,
                DATE_FORMAT(t.departure_at, '%d/%m/%Y %H:%i') AS departure_at,
                arr.city AS arrival_agency,
                DATE_FORMAT(t.arrival_at, '%d/%m/%Y %H:%i') AS arrival_at,
                t.seats_available,
                t.seats_total,
                t.employee_id
            FROM travels t

            INNER JOIN agencies dep
                ON dep.id = t.departure_agency_id

            INNER JOIN agencies arr
                ON arr.id = t.arrival_agency_id

            ORDER BY t.departure_at ASC"
        );

        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $travels = [];
        foreach($results as $item) {
            $travelTmp = new Travel(
                $item['id'],
                $item['departure_agency'],
                $item['arrival_agency'],
                $item['departure_at'],
                $item['arrival_at'],
                $item['seats_available'],
                $item['seats_total'],
                $item['employee_id']
            );
            array_push($travels, $travelTmp);
        };

        return $travels;    
    }

    public function findTravelById(int $id): Travel {
        $query = $this->pdo->prepare(
            "SELECT 
                t.id,
                dep.city AS departure_agency,
                t.departure_at,
                arr.city AS arrival_agency,
                t.arrival_at,
                t.seats_available,
                t.seats_total,
                t.employee_id
             FROM travels t 
             
             INNER JOIN agencies dep
                ON dep.id = t.departure_agency_id

             INNER JOIN agencies arr
                ON arr.id = t.arrival_agency_id
                
             WHERE t.id = :id"    
        );

        $query->execute([
             ':id' => $id
         ]);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        $travel = new Travel(
            $result['id'],
            $result['departure_agency_id'],
            $result['arrival_agency_id'],
            $result['departure_at'],
            $result['arrival_at'],
            $result['seats_available'],
            $result['seats_total'],
            $result['employee_id']
        );
        
        return $travel;    
    }

    public function deleteTravel(int $id): void {
        $query = $this->pdo->prepare(
            "DELETE FROM travels WHERE id = :id"    
        );

        $query->execute([
             ':id' => $id
         ]);
    }

    public function updateTravel(int $id, array $data): void {

        $data = array_intersect_key($data, array_flip(Travel::getAllowedColumns()));

        if (empty($data)) return;

        $set = [];

        foreach ($data as $column => $value) {
            $set[] = "$column = :$column";
        }

        $sql = "UPDATE travels SET " . implode(', ', $set). " WHERE id = :id";

        $data['id'] = $id;

        $query = $this->pdo->prepare($sql);
        $query->execute($data);
    }

    public function createTravel(array $data): void {

        $data = array_intersect_key($data, array_flip(Travel::getAllowedColumns()));

        $columns = array_keys($data);

        $placeholders = array_map(fn(string $column) => ':' .$column, $columns);

        $sql = sprintf(
            "INSERT INTO travels (%s) VALUES (%s)",
            implode(', ', $columns),
            implode(', ', $placeholders)
        );

        $query = $this->pdo->prepare($sql);

        $query->execute($data);
    }
}
