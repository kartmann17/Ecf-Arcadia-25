<?php

namespace App\Controllers; 
use App\Models\AvisModel;

class DashListeAvisController extends DashController
{
    public function index()
    {
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll();
        if (isset($_SESSION['id'])) {
        $this->render("dash/listeavis", 
        compact("Avis"));
    }else {
        http_response_code(404);
    }
}
}