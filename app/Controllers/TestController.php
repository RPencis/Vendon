<?php

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Routing\RouteCollection;

class TestController extends BaseController
{
    public function newTestAction(RouteCollection $routes)
    {
        $postData = $_POST;

        $userModel = new User();
        $result = $userModel->insert(['name' => $postData['userName']]);

        $_SESSION["userId"] = $result;

        $this->Redirect("/answer/" . $postData['selected_test']);
    }
}
