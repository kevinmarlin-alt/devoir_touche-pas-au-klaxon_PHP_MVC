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
        require __DIR__ . "/../Views/login.php";
    }

    public function logout(): void {
        session_destroy();
        var_dump($_SESSION);
        header('Location: /');

    }

    public function login(): void {
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        $employeeService = new LoginService();
        $employee = $employeeService->getEmplyeeByEmail($email);
        var_dump($employee);

        if($employee['passeword'] !== $password) {
            header('Location: /login');
            exit;
        }

        $_SESSION['user'] = [
            'id' => $employee['id'],
            'lastname' => $employee['lastname'],
            'firstname' => $employee['firstname'],
            'email' => $employee['email'],
            'password' => $employee['passeword'],
            'role' => $employee['role']
        ];

        $this->index();
    }
}