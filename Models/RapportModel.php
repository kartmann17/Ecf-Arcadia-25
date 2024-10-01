<?php

namespace App\Models;


class RapportModel extends Model
{
    protected $id;
    protected $nom;
    protected $date;
    protected $status;
    protected $nourriture_reco;
    protected $grammage_reco;
    protected $sante;
    protected $repas_donnees;
    protected $quantite;
    protected $commentaire;
    protected $id_User;
    protected $id_animal;

    public function __construct()
    {
        $this->table = 'Veterinaire';
    }

    //enregistrement d'un rapport 
    public function saveRapport($nom, $date, $status, $nourriture_reco, $grammage_reco, $sante, $repas_donnees, $quantite, $commentaire, $id_User, $id_animal)
    {
        return $this->req(
            "INSERT INTO {$this->table} (nom, date, status, nourriture_reco, grammage_reco, sante, repas_donnees, quantite, commentaire, id_User, id_animal)
            VALUES(:nom, :date, :status, :nourriture_reco, :grammage_reco, :sante, :repas_donnees, :quantite, :commentaire, :id_User, :id_animal)",
            attributs: [
                'nom' => $nom,
                'date' => $date,
                'status' => $status,
                'nourriture_reco' => $nourriture_reco,
                'grammage_reco' => $grammage_reco,
                'sante' => $sante,
                'repas_donnees' => $repas_donnees,
                'quantite' => $quantite,
                'commentaire' => $commentaire,
                'id_User' => $id_User,
                'id_animal' => $id_animal
            ]
        );
    }

    public function recherche($id_animal)
    {
        return $this->req(
            "SELECT v.*, a.nom as nom_animal
             FROM Veterinaire v
             JOIN Animal a On a.id_Animal = v.id_Animal
             WHERE a.id_Animal = :id_animal",
            ['id_animal' => $id_animal]    
        )->fetch();
    }

    // Supprimer un rapport
    public function deleteById($id)
    {
        return $this->delete($id);
    }
}
