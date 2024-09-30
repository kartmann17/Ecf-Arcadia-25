<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class DashListeUserController extends DashController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->selectAllRole();
        if (isset($_SESSION['id'])) {
            $this->render(
                'dash/listeuser',
                [
                    'user' => $user
                ]
            );
        }else {
            http_response_code(404);
        }
    }
}
