<?php 

namespace Src;

use Src\Routing\Router;

class App 
{
    public function __construct()
    {
        $this->passRequestToRouter();
    }

    private function passRequestToRouter()
    {
        $request = new Request;
        $router = new Router($request);
    }
}