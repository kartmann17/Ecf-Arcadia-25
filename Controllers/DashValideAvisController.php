<?php

namespace App\Controllers;

use App\Models\AvisModel;

class DashValideAvisController extends DashController
{
    public function index()
    {
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll();
        if (isset($_SESSION['id_User'])) {
            $this->render("dash/valideavis", compact("Avis"));
        } else {
            http_response_code(404);
        }
    }
}
