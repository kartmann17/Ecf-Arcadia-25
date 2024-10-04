<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;
use App\Models\RaceModel;

class AnimauxController extends Controller
{
    public function index()
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $universModels = new UniversModel();
        $univers = $universModels->findAll();
        $raceModels = new RaceModel();
        $races = $raceModels->findAll();
        $this->render("animaux/index", [
            'animaux' => $animaux,
            'univers' => $univers,
            'races' => $races
        ]);
    }
}
