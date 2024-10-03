<?php
namespace App\controllers;

use App\Models\ServicesModel;

class DashListeServicesController extends DashController
{
    public function index()
    {
        $ServicesModels = new ServicesModel();
        $services = $ServicesModels->findAll();
        // Affichage de la page des services
        if(isset($_SESSION['id_User'])){
            $this->render("dash/listeservices", [
                "services"=> $services
            ]);
        }else {
            http_response_code(404);
        }
    }
    
    public function deleteService()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $ServicesModels = new ServicesModel();

                $result = $ServicesModels->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "Le service a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression du service.";
                }
            } 
            

            // Redirection vers la dashboard
            header("Location: /dash");
            exit();
        }
    }
}