<?php

/**
 * 
 */
class Router
{
	
	public $routes = [
		'GET' => [],
		'POST' => []
	];

	public $method;

	public static function load($file){
		$router = new static;
		require $file;
		return $router;
	}

	function direct($uri, $requestType)
	{
		if (array_key_exists($uri, $this->routes[$requestType])) {
			return $this->routes[$requestType][$uri];
		}

		throw new Exception("No route defined for this uri");
	}

	function get($uri, $controller, $method = '')
	{
		$this->routes['GET'][$uri] = $controller;
		$this->method = $method;
	}

	function post($uri, $controller, $method = '')
	{
	    $this->routes['POST'][$uri] = $controller;
        $this->method = $method;
    }

    function getMethod(){
	    return $this->method;
    }
}