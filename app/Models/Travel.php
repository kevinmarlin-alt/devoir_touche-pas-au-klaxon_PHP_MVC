<?php

namespace App\Models;

class Travel {
    
    public function __construct(
        private int $id,
        //private int $departureAgencyId,
        private string $departureAgency,
        //private int $arrivalAgencyId,
        private string $arrivalAgency,
        private string $departureAt,
        private string $arrivalAt,
        private int $availableSeats,
        private int $totalSeats,
        private int $employeeId
    ) { }

    public function getId(): int {
        return $this->id;
    }

    public function getDepartureAgency(): string {
        return $this->departureAgency;
    }

    public function getArrivalAgency(): string {
        return $this->arrivalAgency;
    }

    public function getDepartureAt(): string {
        return $this->departureAt;
    }

    public function getArrivalAt(): string {
        return $this->arrivalAt;
    }

    public function getAvailableSeats(): int {
        return $this->availableSeats;
    }

    public function getTotalSeats(): int {
        return $this->totalSeats;
    }

    public function getEmployeeId(): int {
        return $this->employeeId;
    }
}