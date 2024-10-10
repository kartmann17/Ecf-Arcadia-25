<?php

namespace App\Controllers;

use App\Models\ConnexionUserModel;

class ConnexionUserController extends Controller
{
    public function index()
    {   // un token CSRF unique se génère pour chaque session User
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        //ajout d'un token lors du chargement de la page
        $this->render('connexion/index', ['csrf_token' => $_SESSION['csrf_token']]);
    }


    public function connexion()
    {
        //verification de la methode en post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Vérification du token  hash_equals fonciton php comparaison 2 chaines de manière sécurisé evite attaque de timing
            if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error_message'] = "Token CSRF invalide.";
                header("Location: /ConnexionUser");
                exit();
            }

            //nettoyage des entrées utilisateurs
            $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
            $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

            //validation de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Email non valide";
                exit();
            }

            //préparation de la requette pour retouver l'email des utilsateurs
            $ConnexionUserModel = new ConnexionUserModel();
            $user = $ConnexionUserModel->recherche($email);

            // Vérification du mot de passe
            if ($user && password_verify($pass, $user->pass)) {

                // Stockage des informations  dans la session
                $_SESSION['id_User'] = $user->id;
                $_SESSION['nom'] = $user->nom;
                $_SESSION['prenom'] = $user->prenom;
                $_SESSION['role'] = $user->role;

                //On regénère le token pour la sécurisation des futurs entrées (vétérinaire, employé)
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                // Redirection vers la page du dashboard
                header("Location: /dash");
                exit();
            } else {
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
