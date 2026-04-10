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
        $uri = strtok($_SERVER['REQUEST_URI'], '?');

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            if ($route['uri'] === $uri) {
                $controller = new $route['controller']();
                $action = $route['action'];
                $controller->$action();
                return;
            }

            $pattern = preg_replace('/\{[a-z]+\}/', '([0-9]+)', $route['uri']);
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                $controller = new $route['controller']();
                $action = $route['action'];
                $controller->$action($matches[1]);
                return;
            }
        }

        http_response_code(404);
        require_once __DIR__ . '/../../src/Views/errors/404.php';
    }
}
