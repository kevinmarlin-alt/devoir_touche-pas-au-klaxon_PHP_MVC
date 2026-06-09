<?php
namespace App\Controllers;

use App\Services\LoginService;
use Exception;

class LoginController {
    public function index(): void {
        if(isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
        require __DIR__ . "/../Views/Login/login.php";
    }

    public function logout(): void {
        session_destroy();
        header('Location: /');

    }

    public function login(): void {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        $employeeService = new LoginService();
        
        $employee = $employeeService->getEmplyeeByEmail($email);
        if(!$employee) {
            $error = "Email ou mot de passe incorrect !";
            require_once __DIR__ . '/../Views/Login/login.php';
            exit;
        }

        $passwordMatch = password_verify($password, $employee['passeword']);
        if(!$passwordMatch) {
            $error = "Email ou mot de passe incorrect !";
            require_once __DIR__ . '/../Views/Login/login.php';
            exit;
        }

        $_SESSION['user'] = [
            'id' => $employee['id'],
            'lastname' => $employee['lastname'],
            'firstname' => $employee['firstname'],
            'role' => $employee['role']
        ];

        $this->index();
    }


}