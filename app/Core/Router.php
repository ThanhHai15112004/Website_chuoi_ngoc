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
        if (!isset($this->routes[$method])) {
            $errorController = new \App\Controllers\ErrorController();
            $errorController->notFound();
            return;
        }

        foreach ($this->routes[$method] as $route => $controllerAction) {
            // Match exactly or regex
            $pattern = '#^' . $route . '$#';
            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove the full string match
                
                list($controller, $action) = explode('@', $controllerAction);
                $controllerClass = "App\\Controllers\\" . $controller;
                
                if (class_exists($controllerClass)) {
                    $controllerInstance = new $controllerClass();
                    if (method_exists($controllerInstance, $action)) {
                        call_user_func_array([$controllerInstance, $action], $matches);
                        return;
                    } else {
                        die("Method $action not found in $controllerClass");
                    }
                } else {
                    die("Controller class $controllerClass not found");
                }
            }
        }
        
        $errorController = new \App\Controllers\ErrorController();
        $errorController->notFound();
    }
}
