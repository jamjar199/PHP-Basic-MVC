<?php

require 'vendor/autoload.php';
$query = require 'core/bootstrap.php';

$controller = "\controllers\\" . Router::load('routes.php')
    ->direct(Request::uri(), Request::method());

$method = 'index';

$class = new $controller($method);


