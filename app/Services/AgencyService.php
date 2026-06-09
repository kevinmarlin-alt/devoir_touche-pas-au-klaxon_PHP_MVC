<?php
namespace App\Services;

use App\Repositories\AgencyRepository;
use Exception;

class AgencyService {
    private AgencyRepository $agencyRepository;
    public function __construct(
        
    )
    { 
        $this->agencyRepository = new AgencyRepository();
    }

    public function getAllAgencies(): array {
        
        return $this->agencyRepository->findAll();

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