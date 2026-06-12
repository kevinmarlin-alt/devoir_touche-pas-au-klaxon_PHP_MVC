<?php
namespace App\Services;

use App\Repositories\TravelRepository;
use DateTime;
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

    public function getTravelById(int $id) {
        return $this->travelRepository->findTravelById($id);
    }

    public function deleteTravel(int $id): void {
        $this->travelRepository->deleteTravel($id);
        $_SESSION['banner'] = "Le trajet a bien été supprimé !";
    }

    public function updateTravel(int $id, array $data): void {
        $data['departure_at'] = new DateTime($data['departure_at'])->format('Y-m-d H:i:s');
        $data['arrival_at'] = new DateTime($data['arrival_at'])->format('Y-m-d H:i:s');
        
        $this->travelRepository->updateTravel($id, $data);
    }

    public function createTravel(array $data): void {
        $data['departure_at'] = new DateTime($data['departure_at'])->format('Y-m-d H:i:s');
        $data['arrival_at'] = new DateTime($data['arrival_at'])->format('Y-m-d H:i:s');
        
        if($data['departure_agency_id'] === $data['arrival_agency_id']) {
            exit();
        }

        if($data['departure_at'] > $data['arrival_at']) {
            exit();
        }

        $this->travelRepository->createTravel($data);
    }
}