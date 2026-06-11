<?php
namespace App\Services;

use App\Models\Travel;
use App\Repositories\TravelRepository;
use Exception;

class TravelService {
    private TravelRepository $travelRepository;

    public function __construct()
    { 
        $this->travelRepository = new TravelRepository();
    }
 
    public function getAvailableTravels(): array {
        $travels = $this->travelRepository->findAvailableTravels();

        if(!$travels) {
            throw new Exception("Il n'y a actuellement aucun trajet enregistré.");
        }

        return $travels;
    }

    public function getAllTravels(): array {
        $travels = $this->travelRepository->findAllTravels();

        if(!$travels) {
            throw new Exception("Il n'y a actuellement aucun trajet enregistré.");
        }



        return $travels;
    }

    public function deleteTravel(int $id): void {
        $this->travelRepository->deleteTravel($id);
    }

    public function updateTravel(int $id, array $data): void {
        $this->travelRepository->updateTravel($id, $data);
    }

    public function createTravel(array $data): void {

        if($data['departure_agency_id'] === $data['arrival_agency_id']) {
            exit;
        }

        if($data['departure_at'] > $data['arrival_at']) {
            exit;
        }

        $this->travelRepository->createTravel($data);
    }
}