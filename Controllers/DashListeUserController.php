<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class DashListeUserController extends DashController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->selectAllRole();
        if (isset($_SESSION['id'])) {
            $this->render(
                'dash/listeuser',
                [
                    'user' => $user
                ]
            );
        }else {
            http_response_code(404);
        }
    }
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'] ?? null;

            if ($id) {
                $userModel = new UserModel();

                $result = $userModel->deleteById($id);

                if ($result) {
                    $_SESSION['success_message'] = "L'utilisateur a été supprimé avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de la suppression de l'utilisateur.";
                }
            } else {
                $_SESSION['error_message'] = "ID utilisateur invalide.";
            }

            // Redirection vers la page de gestion des animaux
            header("Location: /dash");
            exit();
        }
    }

}
