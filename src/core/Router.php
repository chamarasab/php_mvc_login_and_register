<?php

namespace Core;

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[] = compact('method', 'path', 'controller', 'action');
    }

    public function handleRequest($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $controllerName = '\\Controllers\\' . $route['controller'];
                $controller = new $controllerName();
                $action = $route['action'];
                return $controller->$action();
            }
        }

        http_response_code(404);
        echo 'Not Found';
    }
}
?>
