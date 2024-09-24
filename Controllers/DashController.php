<?php

namespace App\Controllers;
class DashController extends Controller
{
    public function index()
    {
        if(isset($_SESSION['id'])){
            $this->render('dash/index');
        }else{
            http_response_code(404);
            echo"la page recherchée n'existe pas";
        }
    }
}