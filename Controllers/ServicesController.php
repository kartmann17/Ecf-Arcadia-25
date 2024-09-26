<?php
namespace App\Controllers;

use App\Models\ServicesModel;


class ServicesController extends Controller
{
    public function index()
    {
        $ServicesModels = new ServicesModel();
        $Services = $ServicesModels->findAll();
        // Affichage de la page des services
        $this->render("nos_services/index", ["Services"=> $Services]);
    }
}