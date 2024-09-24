<?php
namespace App\Controllers;
use App\Models\ServicesModel;

class ServicesController extends Controller
{
    public function index()
    {
       
        $this->render("nos_services/index");

    }
}