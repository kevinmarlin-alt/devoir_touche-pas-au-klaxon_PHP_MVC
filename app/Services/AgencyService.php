<?php
namespace App\Services;

use App\Repositories\AgencyRepository;
use Exception;

class AgencyService {

    public function __construct(
        private AgencyRepository $agencyRepository
    )
    { 
        $agencyRepository = new AgencyRepository();
    }

    public function getAllAgencies(): array {
        
        $agencies = $this->agencyRepository->findAll();

        if(!$agencies) {
            throw new Exception("Il n'y a pas d'agence actuellement.");
        }

        return $agencies;
    }

    public function getAgencyByName(string $city): array {

        $agency = $this->agencyRepository->findByName($city);

        if(!$agency) {
            throw new Exception("L'agence " .$city. " est introuvable.");
        }

        return $agency;

    }

    public function createAgency(string $city): void {
        $this->agencyRepository->create($city);

    }

    public function updateAgency(int $id, string $city): void {
        $this->agencyRepository->update($id, $city);
    }

    public function deleteAgency(int $id): void {
        $this->agencyRepository->delete($id);
    }
}