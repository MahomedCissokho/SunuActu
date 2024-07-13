<?php
class Router {
    private $routes = [];

    public function get($route, $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action) {
        $this->routes['POST'][$route] = $action;
    }

    public function put($route, $action) {
        $this->routes['PUT'][$route] = $action;
    }

    public function delete($route, $action) {
        $this->routes['DELETE'][$route] = $action;
    }

    public function dispatch($method, $uri) {
        // Debugging output
        // echo "Method: $method, URI: '$uri'\n";

        // Remove query string from the URI
        $uri = strtok($uri, '?');
        // Remove trailing slash
        $uri = rtrim($uri, '/');

        // Handle root URL
        if ($uri === '') {
            $uri = '/';
        }

        // echo "Processed URI: '$uri'\n";

        if (array_key_exists($method, $this->routes)) {
            foreach ($this->routes[$method] as $route => $action) {
                if (preg_match($this->convertToRegex($route), $uri, $matches)) {
                    array_shift($matches);
                    if (is_callable($action)) {
                        call_user_func_array($action, $matches);
                    } else {
                        $this->callAction($action, $matches);
                    }
                    return;
                }
            }
        }
        $this->showErrorPage();
    }

    private function convertToRegex($route) {
        // Debugging output
        // echo "Converting route: '$route'\n";

        $route = preg_replace('/\//', '\/', $route);
        $route = preg_replace('/{(\w+)}/', '(\w+)', $route);
        $regex = '/^' . $route . '$/';

        // Debugging output
        // echo "Converted to regex: '$regex'\n";

        return $regex;
    }

    private function callAction($action, $params) {
        [$controllerClass, $method] = $action;

        // echo "Calling controller: '$controllerClass', method: '$method'\n";

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
            } else {
                // echo "Method '$method' not found in controller '$controllerClass'\n";
                $this->showErrorPage();
            }
        } else {
            // echo "Controller class '$controllerClass' not found\n";
            $this->showErrorPage();
        }
    }

    public function showErrorPage() {
        // Handle the display of the error page here
        echo "Page Not Found";
    }
}
?>
