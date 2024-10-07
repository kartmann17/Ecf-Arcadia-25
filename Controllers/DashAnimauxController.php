<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;
use App\Models\RaceModel;

class DashAnimauxController extends DashController
{
    public function ajoutAnimaux()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $age = $_POST['age'] ?? '';
            $img = $_POST['img'] ?? '';
            $id_race = $_POST['id_race'] ?? '';
            $id_habitat = $_POST['id_habitat'] ?? '';
            $description = $_POST['description']?? '';

            // Vérification que tous les champs sont remplis
            if (!empty($nom) && !empty($age) && !empty($img) && !empty($id_race) && !empty($id_habitat) && !empty($description)) {

                if (strlen($nom) < 2) {
                    $_SESSION['error_message'] = "Le nom doit comporter au moins 2 caractères.";
                    header("Location: /addanimaux");
                    exit;
                }

                // Appel du modèle pour l'insertion en base
                $AnimauxModel = new AnimauxModel();
                $result = $AnimauxModel->addAnimaux($nom, $age, $img, $id_race, $id_habitat, $description);

                if ($result) {
                    $_SESSION["success_message"] = "Animal ajouté avec succès.";
                } else {
                    $_SESSION["error_message"] = "Erreur lors de l'ajout de l'animal.";
                }
            } else {
                $_SESSION["error_message"] = "Tous les champs sont requis.";
            }

            // Redirection après traitement
            header("Location: /dash");
            exit;
        }
    }

    public function deleteAnimal()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $AnimauxModel = new AnimauxModel();

                $result = $AnimauxModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'animal a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'animal.";
                }
            } else {
                $_SESSION['error_message'] = "ID d'animal invalide.";
            }

            // Redirection vers la dashboard
            header("Location: /dash");
            exit();
        }
    }

    public function liste()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        if (isset($_SESSION['id_User'])) {
            $this->render('dash/listeanimaux', ['animaux' => $animaux]);
        } else {
            http_response_code(404);
        }
    }

    public function updateAnimal($id)
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->find($id);
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Vérification que tous les champs sont remplis
            $AnimauxModels->hydrate($_POST);

            // Appel du modèle pour l'insertion en base
            if ($AnimauxModels->update($id)) {


                $_SESSION["success_message"] = "Animal modifié avec succès.";
            } else {
                $_SESSION["error_message"] = "Erreur lors de la modification.";
            }

            // Redirection après traitement
            header("Location: /DashAnimaux/liste");
            exit;
        }

        $this->render('dash/updateanimaux', [
            'animaux' => $animaux,
            'univers' => $univers,
            'races' => $races
        ]);
    }

    public function index()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();
        if (isset($_SESSION['id_User'])) {
            // Affichage de la vue d'ajout des animaux
            $this->render("dash/addanimaux", compact('animaux', 'univers', 'races'));
        } else {
            http_response_code(404);
        }
    }
}
