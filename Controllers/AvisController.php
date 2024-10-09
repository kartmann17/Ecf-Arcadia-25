<?php

namespace App\Controllers;

use App\Models\AvisModel;

class AvisController extends MainController
{

    // ajout des avis en base de données depuis le formulaire de la page d'accueil 
    public function ajoutAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $etoiles = $_POST['etoiles'] ?? '';
            $nom = $_POST['nom'] ?? '';
            $commentaire = $_POST['commentaire'] ?? '';
            $date = $_POST['date'] ?? '';

            if (!empty($etoiles) && !empty($nom) && !empty($commentaire)) {
                $AvisModel = new AvisModel();
                $result = $AvisModel->saveAvis($etoiles, $nom, $commentaire, $date);
            }
            header("Location: /main");
            exit;
        }
    }
}
