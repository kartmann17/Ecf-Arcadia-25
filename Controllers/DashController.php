<?php

namespace App\Controllers;

class DashController extends Controller
{
    //affichage du dashboard des employés
    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            $this->render('dash/index');
        } else {
            http_response_code(404);
            echo "la page recherchée n'existe pas";
        }
    }
}
