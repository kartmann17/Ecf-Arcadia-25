<?php
namespace App\Controllers;
use App\Models\AnimauxModel;
use App\Models\RapportModel;

class DashListeRapportController extends DashController
{
    public function index()
    {
        $RapportModel = new RapportModel();
        $rapports = $RapportModel->findAll();
        if(isset($_SESSION['id'])){
            $this->render('dash/listerapport', 
            [
                'rapports' => $rapports
            ]);
        }else {
            http_response_code(404);
        }
    }

    public function deleteRapport()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $RapportModel = new RapportModel();

                $result = $RapportModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "Le rapport a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression du rapport.";
                }
            } 
            // Redirection vers la dashboard
            header("Location: /dash");
            exit();
        }
    }
}