<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class DashUserController extends DashController
{
    public function ajoutUser()
    {
        $userModel = new UserModel();
        $roleModel = new RoleModel();
        $user = $userModel->findAll();
        $roleModel = $roleModel->findAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $email = $_POST['email'] ?? '';
            $pass = $_POST['pass'] ?? '';
            $role = $_POST['role'] ?? '';

            if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($pass) || !empty($role)) {

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error_message'] = "L'email est invalide";
                    header("Location: /adduser");
                    exit;
                }

                // Hashage du mot de passe
                $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

                // Appel du modèle pour l'insertion
                $userModel = new UserModel();
                $result = $userModel->createUser($nom, $prenom, $email, $hashedPass, $role);

                if ($result) {
                    $_SESSION['success_message'] = "Utilisateur ajouté avec succès.";
                } else {
                    $_SESSION['error_message'] = "Erreur lors de l'ajout de l'utilisateur.";
                }
            } else {
                $_SESSION['error_message'] = "Tous les champs sont requis.";
            }
            header("Location: /dash");
            exit;
        }
    }

    public function index()
    {
        if(isset($_SESSION['id_User'])){
            $this->render("dash/adduser");
        } else {
            http_response_code(404);
        }
    }
}
