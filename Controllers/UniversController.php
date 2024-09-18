<?php
namespace App\Controllers;
use App\Models\UniversModel;

class UniversController extends Controller
{
    public function index()
    {
        $UniversMondel = new UniversModel();
        $Univers = $UniversMondel->findAll();
        $this->render(file: "nos_univers/index");
    }
}