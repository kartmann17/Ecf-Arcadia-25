<?php

namespace App\Controllers;
use App\Models\ConnexionUserModel;
class ConnexionUserController extends Controller
{
    public function index()
    {   //verificationd de l'admin
        $this->render('connexion/index');
    }

    public function connexion()
    {
        //verification de la methode en post ou en get 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //nettoyage des entrées utilisateurs
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

            //validation de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email non valide";
                exit();
            }

            //préparation de la requette pour retouver l'email des utilsateur
            $ConnexionUserModel = new ConnexionUserModel();
            $user = $ConnexionUserModel->recherche($email);

            // Vérification du mot de passe
            if ($user && password_verify($pass, $user->pass)) {

                // Stockage des informations  dans la session
                $_SESSION['id_User'] = $user->id;
                $_SESSION['nom'] = $user->nom;
                $_SESSION['prenom'] = $user->prenom;
                $_SESSION['role'] = $user->role;

                header("Location: /dash");
                exit();
            }else{
                $_SESSION['error_message'] = "Email ou mot de passe incorrect";
                header("Location:/ConnexionUser");
                exit();
            }

        }
    }

    public function deconnexion()
{
    session_unset();
    // Redirection page d'accueil
    header("Location: /");
    exit();
}
}