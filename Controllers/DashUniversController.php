<?php

namespace App\Controllers;

use App\Models\UniversModel;

class DashUniversController extends DashController
{
    public function ajoutUnivers()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $img = $_POST['img'] ?? '';
            $description = $_POST['description'] ?? '';

            //Verification de tous les champ sont remplis
            if (!empty($nom) && !empty($img) && !empty($description)) {

                // Appel du modèle pour l'insertion en base
                $UniversModel = new UniversModel();
                $result = $UniversModel->addUnivers($nom, $img, $description);


                if ($result) {
                    $_SESSION["success_message"] = "Habitat ajouté avec succès.";
                } else {
                    $_SESSION["error_message"] = "Erreur lors de l'ajout de l'habitat.";
                }

                // Redirection après traitement
                header("Location: /dash");
                exit();
            } else {
                echo "Tous les champs sont requis.";
            }
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
            $this->render('dash/index', [
                'section' => 'addunivers'
            ]);
        } else {
            http_response_code(404);
        }
    }

    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            // Affichage de la vue d'ajout des animaux
            $this->render("dash/addunivers");
        } else {
            http_response_code(404);
        }
    }
}
