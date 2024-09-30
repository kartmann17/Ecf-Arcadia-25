<?php

namespace App\Controllers;
use App\Models\AnimauxModel;
use App\Models\UniversModel;

class DashListeAnimauxController extends DashController
{
    public function index()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $this->render('dash/listeanimaux', ['animaux' => $animaux]);
    }
}