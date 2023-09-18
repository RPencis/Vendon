<?php 
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
// $routes->add('user', new Route(constant('URL_SUBFOLDER') . '/user/{id}', ['controller' => 'UserController', 'method'=>'showAction'], ['id' => '[0-9]+']));
// $routes->add('new-user', new Route(constant('URL_SUBFOLDER') . '/user', ['controller' => 'UserController', 'method'=>'postAction'],
// [], // Parameters
// [], // Requirements
// '', // Host
// [], // Schemes
// ['POST']));


$routes->add('new-test', new Route(constant('URL_SUBFOLDER') . '/new-test', ['controller' => 'TestController', 'method'=>'newTestAction'],[],[],'',[],['POST']));
$routes->add('answer', new Route(constant('URL_SUBFOLDER') . '/answer/{testId}', ['controller' => 'AnswerController', 'method'=>'showAction'], ['testId' => '[0-9]+']));
$routes->add('answer-result', new Route(constant('URL_SUBFOLDER') . '/result/{testId}', ['controller' => 'AnswerController', 'method'=>'resultAction'], ['testId' => '[0-9]+']));
$routes->add('save-answers', new Route(constant('URL_SUBFOLDER') . '/save-answers/{testId}', ['controller' => 'AnswerController', 'method'=>'answerAction'],[],[],'',[],['POST']));
$routes->add('homepage', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));