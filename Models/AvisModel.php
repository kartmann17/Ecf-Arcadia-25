<?php
namespace App\Models;

use App\config\Connexionbdd;
use PDO;

class AvisModel extends Model
{
    protected $id;
    protected $etoiles;
    protected $nom;
    protected $commentaire;


    public function __construct()
    {
        $this->table = 'addavis';
    }
    public function afficheAvis()
    {
        // Requête SQL pour récupérer tous les avis
        $sql= "SELECT * FROM  {$this->table}";
        return $this->req($sql )->fetchAll();
    }

    // Enregistrer un avis
    public function saveAvis($etoiles, $nom, $commentaire)
    {

        // Préparation et exécution de la requête
        return $this->req(
            "INSERT INTO {$this->table}  (etoiles, nom, commentaire) VALUES (:etoiles, :nom, :commentaire)",
            attributs: [
                'etoiles' => $etoiles,
                'nom' => $nom,
                'commentaire' => $commentaire
            ]
        );

    }
}

