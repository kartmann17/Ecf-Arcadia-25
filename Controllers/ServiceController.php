<?php
namespace App\Controllers;
use App\Models\ServicesModel;

class ServiceController extends Controller
{
    public function index()
    {
        $ServicesModel = new ServicesModel();
        $Services = $ServicesModel->findAll();
        $this->render("nos_services/index");

    }
}