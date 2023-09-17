<?php

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class UserController
{

    public function showAction(int $id, RouteCollection $routes)
    {
        $user = new User();
        $user->find($id);

        require_once APP_ROOT . '/views/user.php';
    }
    public function postAction(RouteCollection $routes)
    {
        $postData = $_POST;

        if (empty($postData)) {
            return null;
        }

        print '<pre>';
        var_dump($postData);
        print '</pre>';
        exit;

        require_once APP_ROOT . '/views/user.php';
    }
}
