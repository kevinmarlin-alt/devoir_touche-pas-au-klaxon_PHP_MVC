<?php
namespace App\Models;

class Employee {

    public function __construct(
        private int $id,
        private string $firstname,
        private string $lastname,
        private string $phone,
        private string $email,
        private string $password,
        private string $role
    ) { }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole(): string {
        return $this->role;
    }
}