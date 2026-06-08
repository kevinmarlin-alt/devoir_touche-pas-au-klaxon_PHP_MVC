<?php
namespace App\Repositories;

use App\Core\Database;
use PDO;

class LoginRepository {
    private PDO $pdo;

    public function __construct(
    ) {
        $this->pdo = Database::getConnection();
    }

    public function findEmployeeByEmail(string $email): array {
        $query = $this->pdo->prepare(
            "SELECT 
                id, 
                lastname, 
                firstname, 
                email, 
                passeword, 
                role 
            FROM employees 
            
            WHERE email = :email
            "
        );

        $query->execute([
            ":email" => $email
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

}