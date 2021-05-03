<?php 

namespace Src\Routing;

use Src\Request;

class Router
{
    public function __construct(private Request $request)
    {
        $this->route = Route::getInstance();

        dump($this);
    }
}