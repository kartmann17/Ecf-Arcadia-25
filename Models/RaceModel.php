<?php

namespace App\Models;


class RaceModel extends Model
{
    protected $id;
    protected $race;


    public function __construct()
    {
        $this->table = "Race";
    }

    public function addRace($race)
    {
        return $this->req(
            "INSERT INTO " . $this->table . "(race) VALUES (:race)",
            [
                'race' => $race
            ]
        );
    }

    public function updateRace($id)
    {
        $champs =[];
        $valeurs = [];

        foreach($this as $champ => $valeur)
    {
        
        if($valeur != null && $champ != 'db' && $champ != 'table'){
        $champs[] = "$champ = ?";
        $valeurs[] = $valeur;
        }
    }
    $valeurs[] = $id;
    $liste_champs = implode(', ', $champs);
    return $this->req('UPDATE '.$this->table. ' SET '. $liste_champs.' WHERE id = ?', $valeurs);
    }

    public function deleteById($id)
    {
        return $this->delete($id);
    }

    public function hydrate( $donnees)
   {
    foreach($donnees as $key =>$value){
        $method = 'set' . ucfirst($key);
        if(method_exists($this, $method)){
            $this->$method($value);
        }
    }
    return $this;
   }

    public function getId()
    {
        return $this->id;
    }

    public function getRace()
    {
        return $this->race;
    }

    public function setRace($race)
    {
        $this->race = $race;
        return $this;
    }
}