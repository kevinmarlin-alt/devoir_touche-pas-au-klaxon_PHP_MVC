<?php

namespace App\Models;

class Travel {
    private int $id;

    public function __construct(
        private int $departureAgencyId,
        private int $arrivalAgencyId,
        private string $departurelAt,
        private string $arrivalAt,
        private int $availableSeats,
        private int $totalSeats,
        private int $employeeId
    ) { }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDepartureAgencyId(): int {
        return $this->departureAgencyId;
    }

    public function getArrivalAgencyId(): int {
        return $this->arrivalAgencyId;
    }

    public function getDeparturelAt(): string {
        return $this->departurelAt;
    }

    public function getArrivalAt(): string {
        return $this->arrivalAt;
    }

    public function getAvaivableSeats(): int {
        return $this->availableSeats;
    }

    public function getTotalSeats(): int {
        return $this->totalSeats;
    }

    public function getEmployeeId(): int {
        return $this->employeeId;
    }
}