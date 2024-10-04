<?php

namespace App\Controllers;

use App\Models\AnimauxModel;
use App\Models\UniversModel;

class UniversController extends Controller
{
    public function index()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();
        $this->render('nos_univers/index', ['univers' => $univers]);
    }
    public function showAnimaux($id)
    {
        $AnimauxModel = new AnimauxModel();
        $animaux = $AnimauxModel->findby(['id_habitat' => $id]);
        $universModel = new UniversModel();
        $univers = $universModel->find($id);

        $this->render('nos_univers/show', ['animaux' => $animaux, 'univers' => $univers]);
    }
}
