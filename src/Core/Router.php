<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute($method, $uri, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                $controller = new $route['controller']();
                $action = $route['action'];
                $controller->$action();
                return;
            }
        }
        http_response_code(404);
        echo "404 - Page not found";
    }
}
