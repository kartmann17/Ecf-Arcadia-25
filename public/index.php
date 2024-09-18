<?php
use App\Autoloader;
use App\Config\main;

//je définie une constante avec le dossier racine du projet 
define('ROOT', dirname(__DIR__));

// import de l'autolader
require_once ROOT.'/Autoloader.php';
Autoloader::register();

// instanciation du main(le routeur)
$app = new main;

//démarrage de l'application
$app->start(); 
