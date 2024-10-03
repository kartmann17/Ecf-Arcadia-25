<?php

namespace App\Controllers; 
use App\Models\AvisModel;

class DashListeAvisController extends DashController
{
    public function index()
    {
        $AvisModel = new AvisModel();
        $Avis = $AvisModel->findAll();
        if (isset($_SESSION['id_User'])) {
        $this->render("dash/listeavis", 
        compact("Avis"));
    }else {
        http_response_code(404);
    }
}
public function deleteAvis()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $AvisModel = new AvisModel();

                $result = $AvisModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'avis a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'avis.";
                }
            } else {
                $_SESSION['error_message'] = "ID invalide.";
            }

            // Redirection vers le dashboard
            header("Location: /dash");
            exit();
        }

    }
    public function validerAvis($id)
        {
            $avisModel = new AvisModel();
            $avisModel->validerAvis($id);
            header("Location: /dash");
        }

}