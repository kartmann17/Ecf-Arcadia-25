<?php

namespace App\config;

use App\Controllers\MainController;

class Main
{
    public function start()
    {
        session_start();

        // on récupére l'url
        $uri = $_SERVER['REQUEST_URI'];

        //on verifie que uri n'est pas vide et se termine par un /
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            // On enlève le /
            $uri = substr($uri, 0, -1);

            // envoi un code de redirection permanent
            http_response_code(301);

            // on redirige vers l'url sans /
            header('Location: ' . $uri);
        }

        // gestion des paramètre d'URL
        //p=controleur/methode/paramètres
        //séparation des paramètres dans un tableau
        $params = isset($_GET['p']) ? explode('/', filter_var($_GET['p'], FILTER_SANITIZE_URL)) : [];

        // var_dump($params);
        if (isset($params[0]) && $params[0] != '') {
            //récupération du controleur a instancier
            //mettre une majuscule en 1 er lettre et ajout du namespace complet avant et ajout du "controller" après
            $controllerName = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';

            if (class_exists($controllerName)) {
                // instenciation du controleur
                $controller = new $controllerName();
            } else {
                http_response_code(404);
                exit();
            }

            //récupération du 2 eme paramètre d'url
            $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (method_exists($controller, $action)) {
                // si il reste des paramètres on les passe à la méthode
                call_user_func_array([$controller, $action], $params);
            } else {
                http_response_code(404);
                echo "la page recherchée n'existe pas";
            }
        } else {
            //on instencie le controleur par defaut car pas de paramètre
            $controller = new MainController();

            // appel de la methode index
            $controller->index();
        }
    }
}
