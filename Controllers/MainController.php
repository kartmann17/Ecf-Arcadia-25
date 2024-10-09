<?php

namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\HorairesModel;

class MainController extends Controller
{
    public function index()
    {
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll();
        $this->render("acceuil/index", compact("Avis"));  //Affichage des avis validé depuis le dashboard sur la page d'accueil 
    }

}
