<?php

require 'vendor/autoload.php';

//start a new router
$router = new Router();

//get the current controller and method
$controller =  $router->load('routes.php')->direct(Request::uri(), Request::requestType());

//split controller and method
$controller = explode('@', $controller);

//assign controller and method
$method = $controller[1];
$controller = $controller[0];

//add folder to controller
$controller = "\controllers\\" . $controller;

$class = new $controller($method);


