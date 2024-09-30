<?php

namespace App\Controllers;

use App\Models\UniversModel;

class DashListeUniversController extends DashController
{
    public function index()
    {
        $UniversModel = new UniversModel();
        $univers = $UniversModel->findAll();

        if (isset($_SESSION['id'])) {
            $this->render('dash/listeunivers', [
                'univers' => $univers
            ]);
        } else {
            http_response_code(404);
        }
    }
}
