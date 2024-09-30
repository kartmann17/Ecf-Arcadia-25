<?php
namespace App\Controllers;
use App\Models\AnimauxModel;
use App\Models\RapportModel;

class DashListeRapportController extends DashController
{
    public function index()
    {
        $RapportModel = new RapportModel();
        $rapports = $RapportModel->findAll();
        if(isset($_SESSION['id'])){
            $this->render('dash/listerapport', 
            [
                'rapports' => $rapports
            ]);
        }else {
            http_response_code(404);
        }

    }
}