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
}