<?php 

namespace Src;

use Src\Routing\Router;

class App 
{
    public function __construct()
    {
        $this->loadWebRoutes();
        $this->passRequestToRouter();
    }

    private function loadWebRoutes() 
    {
        require ROUTES_PATH . "web.php";
    }

    private function passRequestToRouter()
    {
        $request = new Request;
        $router = new Router($request);
    }
}