<?php

namespace App\Controllers;

use App\Models\RaceModel;

class DashRaceController extends DashController
{
    public function liste()
    {
        $RaceModel = new RaceModel();
        $races = $RaceModel->findAll();

        if(isset($_SESSION['id_User'])){
            $this->render('dash/listeraces', [
                'races' => $races
            ]);
        }else {
            http_response_code(404);
    }
}
    
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

    public function deleteRace()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $RaceModel = new RaceModel();

                $result = $RaceModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "La race a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de la race.";
                }
            } else {
                $_SESSION['error_message'] = "ID race invalide.";
            }

            // Redirection vers la dashboard
            header("Location: /dash");
            exit();
        }
    }

    public function updateRace($id)
    {
        $RaceModels = new RaceModel();
        $races = $RaceModels->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Vérification que tous les champs sont remplis
            $RaceModels->hydrate($_POST);

            // Appel du modèle pour l'insertion en base
            if ($RaceModels->update($id)) {


                $_SESSION["success_message"] = "Race modifié avec succès.";
            } else {
                $_SESSION["error_message"] = "Erreur lors de la modification.";
            }

            // Redirection après traitement
            header("Location: /dash");
            exit;
        }

        $this->render('dash/updateraces', [
            'races' => $races
        ]);
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
