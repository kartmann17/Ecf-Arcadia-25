<?php
namespace App\Controllers;
use App\Models\AnimauxModel;

class AnimauxController extends Controller
{
    public function index()             
    {
        $AnimauxModels = new AnimauxModel();
        $animaux = $AnimauxModels->findAll();
        $this->render("animaux/index", 
        ['animaux'=>$animaux]);
    }

}