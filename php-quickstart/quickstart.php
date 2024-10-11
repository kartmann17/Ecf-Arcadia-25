<?php

require __DIR__ . '/../vendor/autoload.php';

use MongoDB\Client;
use Dotenv\Dotenv;


$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$uri = getenv('MONGODB_URI');

if (!$uri) {
    throw new RuntimeException('MongoDB URI not found. Make sure the MONGODB_URI environment variable is set.');
}

try {
    // Connexion au client MongoDB
    $client = new Client($uri);
    $collection = $client->votre_base_de_donnees->horaires;


    // Optionnel : Afficher un document spécifique
    $filter = ['jour' => 'Lundi'];
    $result = $collection->findOne($filter);

    if ($result) {
        echo "\nDocument trouvé : " . json_encode($result, JSON_PRETTY_PRINT);
    } else {
        echo "\nDocument non trouvé";
    }

} catch (Exception $e) {

    echo 'Error connecting to MongoDB: ' . $e->getMessage();
}