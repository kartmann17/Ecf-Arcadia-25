<?php

namespace App\Models;

class AnimauxModel extends Model
{
    protected $id;
    protected $nom;
    protected $age;
    protected $img;
    protected $visite;
    protected $id_race;
    protected $id_habitat;
    public function __construct() 
    {
        $this->table = "Animal";

    }
    public function addAnimaux($name, $age, $img, $id_race, $id_habitat)
    {
        return $this->req(
            "INSERT INTO " . $this->table . " (name, age, img, id_race, id_habitat) 
             VALUES (:name, :age, :img, :id_race, :id_habitat)", 
            [
                'name' => $name,
                'age' => $age,
                'img' => $img,
                'id_race' => $id_race,
                'id_habitat' => $id_habitat
            ]
        );  
    }
}

