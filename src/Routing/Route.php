<?php 

namespace Src\Routing;

class Route 
{
    private static Route $route;
    private array $methods = ['get', 'post'];
    private array $routingTable = []; 

    public static function __callStatic($method, $arguments)
    {
        $route = self::$route ?? self::getInstance();
        if ($route->isAvailableMethod($method)) {
            $route->add($method, $arguments);
        }
    }

    public static function getInstance()
    {
        self::$route = new Route;
        return self::$route;
    }

    public function add($method, $arguments)
    {
        $this->routingTable[$arguments[0]] = [
            'method'     => strtoupper($method),
            'controller' => $arguments[1][0],
            'action'     => $arguments[1][1],
        ];
    }

    public function isAvailableMethod(string $method)
    {
        return in_array($method, $this->methods);
    }

    public static function getRoutingTable()
    {
        return self::$route->routingTable;
    }
}