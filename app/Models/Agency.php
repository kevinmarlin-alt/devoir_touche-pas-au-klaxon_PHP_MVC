<?php
namespace App\Models;

class Agency {

    public function __construct(
        private int $id,
        private string $city
    ) { }

    public function getId(): int {
        return $this->id;
    }

    public function getCity(): string {
        return $this->city;
    }
}