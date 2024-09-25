<?php
namespace App\Controllers;
use App\Models\AnimauxModel;

class DashAnimauxController extends DashController
{
    public function index()             
    {
        $AnimauxModels = new AnimauxModel();
        $Animaux = $AnimauxModels->findAll();
        $this->render("dash/addanimaux", ['Animaux'=>$Animaux]);
    }
}