<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;

class DashListeAnimauxController extends DashController
{
    public function index()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        if(isset($_SESSION['id_User'])){
        $this->render('dash/listeanimaux', ['animaux' => $animaux]);
        } else {
            http_response_code(404);
        }
    }

    public function updateAnimal($id)
    {
        
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
}
