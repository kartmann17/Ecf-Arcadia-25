<?php

namespace App\Controllers;

use App\Models\UniversModel;

class DashListeUniversController extends DashController
{
    public function index()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();

        if (isset($_SESSION['id'])) {
            $this->render('dash/listeunivers', [
                'univers' => $univers
            ]);
        } else {
            http_response_code(404);
        }
    }
    public function deleteUniver()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id']?? null;

            if ($id) {
                $UniversModel = new UniversModel();

                $result = $UniversModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'habitat a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'habitat.";
                }
            } else {
                $_SESSION['error_message'] = "ID d'habitat invalide.";
            }

            // Redirection vers la page de gestion des habitats
            header("Location: /dash");
            exit();
        }
    }
}
