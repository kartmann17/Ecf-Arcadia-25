<?php

namespace App\Models;

class AnimauxModel extends Model
{
    protected $id_animal;
    protected $nom;
    protected $age;
    protected $id_habitat;
    public function __construct() 
    {
        $this->table = "Animal";

    }
    public function img()
    {
        $sql= "SELECT i.url, a.nom, a.age FROM $this->table a JOIN Image_Animal i ON i.id_animal = a.id_animal";
        return $this->req($sql);
    }
}

