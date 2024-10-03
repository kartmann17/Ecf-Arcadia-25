<?php
namespace App\controllers;

use App\Controllers\DashController;
use App\Models\RaceModel;

class DashListeRaceController extends DashController
{
    public function index()
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
}