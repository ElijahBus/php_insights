<?php

namespace server\app;

require_once 'Controller.php';

use Exception;

class Router
{

    /**
     * @var \PDO
     */
    private \PDO $dbConnection;

    /**
     * @var array
     */
    private array $routes = [];

    public function __construct(array $routes, $dbConnection)
    {
        $this->routes = $routes;

        $this->dbConnection = $dbConnection;
    }

    /**
     * @throws \Exception
     */
    public function resolve()
    {
        $uri           = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri           = explode('/', $uri);

        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestBody = (array) json_decode(file_get_contents('php://input'), TRUE);

        $arrayKeys = array_keys($this->routes);

        $filterRoutes = function () use ($arrayKeys, $uri) {
            return array_filter($arrayKeys, function ($route) use ($uri) {
                return $route == $uri[1];
            });
        };

        if ($route = $filterRoutes()) {
            call_user_func([
                new $this->routes[$route[0]][0]($this->dbConnection),
                $this->canExtractRequestBody($requestMethod) ? $this->routes[$route[0]][1]($requestBody) : $this->routes[$route[0]][1]
            ]);
        } else {
            throw new Exception("No route handler for route /$uri[1] ");
        }
    }

    private function canExtractRequestBody(string $method): bool
    {
        $extractableRequests = ['POST', 'PUT', 'DELETE'];
        if (in_array($method, $extractableRequests)) {
            return true;
        }

        return false;
    }

}
