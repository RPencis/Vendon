<?php

namespace App\Controllers;

use App\Models\Test;
use Symfony\Component\Routing\RouteCollection;

class AnswerController extends BaseController
{
    public function showAction(int $testId, RouteCollection $routes)
    {
        $testModel  = new Test();
        $test = $testModel->find($testId);
        
        require_once APP_ROOT . '/views/answer.php';

    }
}
