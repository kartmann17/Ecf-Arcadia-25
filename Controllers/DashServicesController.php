<?php

namespace App\Controllers;

use App\Models\ServicesModel;

class DashServicesController extends DashController
{
    public function ajoutService()
    {
        $ServicesModel = new ServicesModel();
        $services = $ServicesModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupération des données du formulaire
            $nom = $_POST['nom'] ?? '';
            $description = $_POST['description'] ?? '';
            $id_user = $_SESSION['id'];
            $img = $_POST['img'] ?? '';

            // Vérification que tous les champs sont remplis
            if (!empty($nom) && !empty($description) && !empty($id_user) && !empty($img)) {

                // Appel du modèle pour l'insertion en base
                $ServicesModel = new ServicesModel();
                $result = $ServicesModel->createService($nom, $description, $id_user, $img);

                if ($result) {
                    $_SESSION["success_message"] = "Service ajouté avec succès.";
                } else {
                    $_SESSION["error_message"] = "Erreur lors de l'ajout du Service";
                }

                // Redirection après traitement
                header("Location: /dash");
                exit();
            } else {
                echo "Tous les champs sont requis.";
            }
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employé') {
            $this->render('dash/index', [
                'section' => 'addservice'
            ]);
        } else {
            http_response_code(404);
        }
    }

    public function index()
    {
        if (isset($_SESSION['id_User'])) {
            // Affichage de la page des services
            $this->render("dash/addservice");
        } else {
            http_response_code(404);
        }
    }
}
