<?php 

namespace Src\Routing;

class Route 
{
    private static Route|null $route = null;
    private array $methods = ['get', 'post'];
    private array $routingTable = [];
    public $currentUrl;

    public static function __callStatic($method, $arguments)
    {
        $route = self::getInstance();
        if ($route->isAvailableMethod($method)) {
            return $route->add($method, $arguments);
        }
    }

    public static function getInstance()
    {
        if (! self::$route) {
            self::$route = new Route;
        }

        return self::$route;
    }

    private function add($method, $arguments)
    {
        $this->currentUrl = $arguments[0];

        $this->routingTable[$this->currentUrl] = [
            'method'      => strtoupper($method),
            'controller'  => $arguments[1][0],
            'action'      => $arguments[1][1],
            'name'        => null,
            'middlewares' => [],
        ];

        return $this;
    }

    private function isAvailableMethod(string $method)
    {
        return in_array($method, $this->methods);
    }

    public function has(string $url)
    {
        return array_key_exists($url, $this->routingTable);
    }

    public function getOneByUrl(string $url)
    {
        return $this->routingTable[$url];
    }

    public function getOneByName(string $name)
    {        
        foreach ($this->routingTable as $url => $routeData) {
            if ($name == $routeData['name']) 
            return $url;
        }
    }

    public function getAll()
    {
        return $this->routingTable;
    }

    public function name(string $name)
    {
        $this->routingTable[$this->currentUrl]['name'] = $name;

        return $this;
    }

    public function middleware(array $middlewares)
    {
        $this->routingTable[$this->currentUrl]['middlewares'] = $middlewares;

        return $this;
    }
}