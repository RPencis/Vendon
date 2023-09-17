<?php 

namespace App\Controllers;

use App\Models\Test;
use Symfony\Component\Routing\RouteCollection;

class PageController
{
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
		$testList = [
			1 => new Test('',['id' => 1,'name' => 'Test 1']),
			2 => new Test('',['id' => 2,'name' => 'Test 2']),
			3 => new Test('',['id' => 3,'name' => 'Test 3']),
		];
        require_once APP_ROOT . '/views/home.php';
	}
}