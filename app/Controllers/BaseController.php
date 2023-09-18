<?php

namespace App\Controllers;

use App\Models\User;

class BaseController
{
    public function  Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }

    public function GetUser()
    {
        if (isset($_SESSION['user_id'])) {
            $userModel = new User();
            return $userModel->find($_SESSION['user_id']);
        }
        return null;
    }
}
