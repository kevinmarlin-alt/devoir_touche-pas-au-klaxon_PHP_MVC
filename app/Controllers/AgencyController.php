<?php
namespace App\Controllers;

use App\Controllers\DashboardController;
use App\Core\Controller;
use App\Services\AgencyService;

class AgencyController extends Controller{

    public function indexCreate() {
        $this->render('Agency/create');
    }

    public function indexUpdate(int $id): void {
        $agency = (new AgencyService)->getAgencyById($id);
        $this->render('Agency/update',compact('agency'));
    }
   
    public function createNewAgency(): void {
        $city = $_POST['city'];
        if(!empty($city)) {
            (new AgencyService)->createAgency($city);
            $_SESSION['banner'] =  'La nouvelle agence a bien été ajoutée !';
            header('Location: /dashboard/#agencies');
            exit;
        } else {
            $_SESSION['banner'] =  'Le nom de la ville ne peut pas être vide';
            header('Location: /dashboard/#agencies');
            exit;
        }
        
    }

    public function deleteAgency(int $id): void {
        (new AgencyService)->deleteAgencyById($id);
        $_SESSION['banner'] = "L'agence a bien été supprimée !";
        header('Location: /dashboard/#agencies');
        exit;
    }

    public function updateAgency(int $id, array $data): void {
        $city = $data['city'];
        (new AgencyService)->updateAgency($id, $city);
        $_SESSION['banner'] = "Le nom de l'agence a bien été modifié !";
    }
}