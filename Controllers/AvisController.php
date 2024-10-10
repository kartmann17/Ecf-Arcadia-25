<?php

namespace App\Controllers;

use App\Models\AvisModel;

class AvisController extends MainController
{

    // ajout des avis en base de données depuis le formulaire de la page d'accueil
    public function ajoutAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $etoiles = filter_var($_POST['etoiles'] ?? '', FILTER_SANITIZE_NUMBER_INT);
            $nom = htmlspecialchars(trim($_POST['nom']), ENT_QUOTES, 'UTF-8');
            $commentaire = htmlspecialchars(trim($_POST['commentaire']), ENT_QUOTES, 'UTF-8');
            $date = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');


            if (!empty($etoiles) && !empty($nom) && !empty($commentaire)) {
                $AvisModel = new AvisModel();
                $result = $AvisModel->saveAvis($etoiles, $nom, $commentaire, $date);
            }
            header("Location: /main");
            exit;
        }
    }
}
