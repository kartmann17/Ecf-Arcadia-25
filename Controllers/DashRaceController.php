<?php

namespace App\Controllers;

use App\Models\RaceModel;

class DashRaceController extends DashController
{
    public function ajoutRace()
    {
        $RaceModel = new RaceModel();
        $races = $RaceModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $race = $_POST['race'] ?? '';


            // Vérification que tous les champs sont remplis
            if (!empty($race)) {

                // Appel du modèle pour l'insertion en base
                $RaceModel = new RaceModel();
                $result = $RaceModel->addRace($race);

                if ($result) {
                    $_SESSION['success_message'] = "Race ajoutée avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de l'ajout de la race.";
                }

                // Redirection après traitement
                header("Location: /dash");
                exit;
            }
        }
    }
    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            $this->render("dash/addrace");
        } else {
            http_response_code(404);
        }
    }
}
