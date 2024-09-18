<?php

namespace App\Models;

class UniversModel extends Model
{
    protected $id_habitat;
    protected $nom_habitat;
    protected $desciption;

    public function __construct()
    {
        $this->table ="Habitat";
    }
}