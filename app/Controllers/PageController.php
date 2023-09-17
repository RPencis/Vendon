<?php

namespace App\Controllers;

use App\Models\Test;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
	// Homepage action
	public function indexAction(RouteCollection $routes)
	{
		$testModel = new Test();
		$testList = $testModel->getAll();

		require_once APP_ROOT . '/views/home.php';
	}
}
