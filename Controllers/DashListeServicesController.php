<?php
namespace App\controllers;

use App\Models\ServicesModel;

class DashListeServicesController extends DashController
{
    public function index()
    {
        $ServicesModels = new ServicesModel();
        $services = $ServicesModels->findAll();
        // Affichage de la page des services
        if(isset($_SESSION['id'])){
            $this->render("dash/listeservices", [
                "services"=> $services
            ]);
        }else {
            http_response_code(404);
        }
    }
}