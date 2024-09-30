<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;

class DashAnimauxController extends DashController
{
    public function ajoutAnimaux()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $age = $_POST['age'] ?? '';
            $img = $_POST['img'] ?? '';
            $id_habitat = $_POST['id_habitat'] ?? '';

            // Vérification que tous les champs sont remplis
            if (!empty($nom) && !empty($age) && !empty($img) && !empty($id_habitat)) {

                if (strlen($nom) < 2) {
                    $_SESSION['error_message'] = "Le nom doit comporter au moins 2 caractères.";
                    header("Location: /addanimaux");
                    exit;
                }

                // Appel du modèle pour l'insertion en base
                $AnimauxModel = new AnimauxModel();
                $result = $AnimauxModel->addAnimaux($nom, $age, $img, $id_habitat);

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

    public function index()
    {
        // Affichage de la vue d'ajout des animaux
        $this->render("dash/addanimaux");
    }
}
