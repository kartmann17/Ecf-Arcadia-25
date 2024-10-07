<?php

namespace App\Controllers;

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
        $universModel = new UniversModel();
        $univers = $universModel->getDetails($id);
        $Habitat = $universModel->find($id);

        $this->render('nos_univers/show', [
            'univer' => $univers,
            'Habitat' => $Habitat
            ]);
    }
}
