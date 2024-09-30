<?php
namespace App\Models;

use App\Config\Connexionbdd;
use PDO;

class AvisModel extends Model
{
    protected $id;
    protected $etoiles;
    protected $nom;
    protected $commentaire;
    protected $date;


    public function __construct()
    {
        $this->table = 'addavis';
    }
    public function afficheAvis()
    {
        // Requête SQL pour récupérer tous les avis
        $sql= "SELECT * FROM  {$this->table}";
        $result = $this->req($sql)->fetchAll();
        return $result;
    }

    // Enregistrer un avis
    public function saveAvis($etoiles, $nom, $commentaire, $date)
    {

        // Préparation et exécution de la requête
        return $this->req(
            "INSERT INTO {$this->table} (etoiles, nom, commentaire, date) VALUES (:etoiles, :nom, :commentaire, :date)",
            attributs: [
                'etoiles' => $etoiles,
                'nom' => $nom,
                'commentaire' => $commentaire,
                'date' => $date 
            ]
        );

    }
}

