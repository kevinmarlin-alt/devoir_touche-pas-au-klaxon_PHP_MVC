<?php

namespace App\Models;

class Travel {
    
    public function __construct(
        private int $id,
        private string $departureAgency,
        private string $arrivalAgency,
        private string $departureAt,
        private string $arrivalAt,
        private int $availableSeats,
        private int $totalSeats,
        private int $employeeId
    ) { }

    public static function getAllowedColumns(): array {
        return [
            'departure_agency_id',
            'arrival_agency_id',
            'departure_at',
            'arrival_at',
            'seats_total',
            'seats_available',
            'employee_id',
        ];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getDepartureAgency(): string {
        return $this->departureAgency;
    }

    public function getArrivalAgency(): string {
        return $this->arrivalAgency;
    }

    public function getDeparturelAt(): string {
        return $this->departureAt;
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