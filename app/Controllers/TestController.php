<?php

namespace App\Controllers;

use App\Models\Test;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouteCollection;

class TestController extends BaseController
{
    public function newTestAction(RouteCollection $routes)
    {
        $postData = $_POST;
        
        $this->Redirect("/answer/".$postData['selected_test']);
    }
}
