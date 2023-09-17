<?php

namespace App\Controllers;

use Symfony\Component\Routing\RouteCollection;

class TestController
{
    public function newTestAction(RouteCollection $routes)
    {
        $postData = $_POST;

        print '<pre>';
        var_dump($_POST);
        print '</pre>';
        exit;
    }
}
