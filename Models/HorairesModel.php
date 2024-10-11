<?php
namespace App\Models;

use App\Config\MongoConnection;
use MongoDB\Client;

class HorairesModel extends MongoConnection
{
    protected $table = "horaires";
    protected $client;
    protected $collection;

    public function __construct()
    {
        // Initialisation de la connexion MongoDB
        parent::__construct();
        $this->collection = $this->client->selectCollection('votre_base_de_donnees', $this->table);
    }

    /**
     * Récupérer tous les horaires de la collection.
     *
     * @return array Les horaires.
     */
    public function getAllHoraires()
    {
        $documents = $this->collection->find();
        $horaires = [];
        foreach ($documents as $document) {
            $horaires[] = [
                'jour' => $document['jour'],
                'ouverture' => $document['ouverture'],
                'fermeture' => $document['fermeture'] ?? 'Fermé' // Assurez-vous que les champs existent ou gérez les valeurs par défaut
            ];
        }
        return $horaires;
    }

    /**
     * Ajouter un horaire dans la collection.
     *
     * @param string $jour Le jour de la semaine.
     * @param string $ouverture Heure d'ouverture.
     * @param string $fermeture Heure de fermeture.
     * @return bool Indique si l'insertion a réussi.
     */
    public function addHoraire($jour, $ouverture, $fermeture)
    {
        $result = $this->collection->insertOne([
            'jour' => $jour,
            'ouverture' => $ouverture,
            'fermeture' => $fermeture
        ]);

        return $result->getInsertedCount() === 1;
    }
}