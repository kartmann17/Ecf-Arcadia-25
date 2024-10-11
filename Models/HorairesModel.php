<?php
namespace App\Models;

use App\config\MongoConnection;


class HorairesModel extends MongoConnection
{
    protected $table = "horaires";
    protected $client;
    protected $collection;

    public function __construct()
    {
        // Initialisation de la connexion MongoDB
        parent::__construct();
        $this->collection = $this->getCollection('Arcadia', 'horaires');
    }

    /**
     * Récupérer tous les horaires de la collection.
     *
     * @return array Les horaires.
     */
    public function getAllHoraires()
    {
        return $this->collection->find()->toArray();
    }

}