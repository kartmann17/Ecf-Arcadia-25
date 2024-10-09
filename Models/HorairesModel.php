<?php
namespace App\Models;

class HorairesModel extends Model
{
protected $jours;
protected $heures_debut;
protected $heures_fin;

public function __construct()
{
    $this->table = "horaires";
}

}

