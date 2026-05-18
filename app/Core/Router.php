<?php

namespace App\Core;

class Router {
    protected $routes = [];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function dispatch($uri, $method) {
        if (isset($this->routes[$method][$uri])) {
            $controllerAction = $this->routes[$method][$uri];
            // $controllerAction might be "User\HomeController@index"
            list($controller, $action) = explode('@', $controllerAction);
            
            // Add namespace prefix
            $controllerClass = "App\\Controllers\\" . $controller;
            
            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();
                if (method_exists($controllerInstance, $action)) {
                    $controllerInstance->$action();
                } else {
                    die("Method $action not found in $controllerClass");
                }
            } else {
                die("Controller class $controllerClass not found");
            }
        } else {
            http_response_code(404);
            die("404 Not Found");
        }
    }
}
