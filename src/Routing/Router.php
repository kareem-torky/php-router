<?php 

namespace Src\Routing;

use Src\Controller;
use Src\Routing\Exceptions\ActionNotFound;
use Src\Routing\Exceptions\ControllerNotFound;
use Src\Routing\Exceptions\MethodNotAllowed;
use Src\Routing\Exceptions\RouteNotFound;
use Src\View;

class Router
{
    private $url, $method, $data;
    private Controller $controller;
    private Route $route;
    private $routeData;

    public function __construct(private $request)
    {
        $this->url = $request->getUrl();
        $this->method = $request->getMethod();
        $this->data = $request->getData();
        $this->route = Route::getInstance();
        // dump($this);
        $this->match();
        $this->applyMiddlewares();
        $this->callAction();
    }

    private function match()
    {
        try {
            $this->matchUrl();
            $this->matchMethod();
        } catch (RouteNotFound|MethodNotAllowed $exception) {
            View::errorRender($exception->getMessage());
        }
    }

    private function matchUrl()
    {
        if (! $this->route->has($this->url)) {
            throw new RouteNotFound("404 not found");
        }
    }

    private function matchMethod()
    {
        $this->routeData = $this->route->getOneByUrl($this->url);

        if ($this->routeData['method'] !== $this->method) {
            throw new MethodNotAllowed("405 method not allowed");
        }
    }

    private function applyMiddlewares()
    {
        $middlewares = $this->routeData['middlewares'];

        foreach ($middlewares as $middleware) {
            $middlewareObj = $this->getMiddlewareObj($middleware);
            $middlewareObj->handle($this->request);
        }
    }

    private function getMiddlewareObj($middleware) 
    {
        $middlewareClass = str_replace(" ", "", ucwords(str_replace("-", " ", $middleware)));
        $middlewareClassWithNs = "App\Http\Middlewares\\" . $middlewareClass;
        return new $middlewareClassWithNs;
    }

    private function callAction()
    {
        try {
            $this->getControllerObject();
            $this->callActionOnController();
        } catch (ControllerNotFound|ActionNotFound $exception) {
            die($exception->getMessage());
        }
    }

    private function getControllerObject()
    {
        $controllerClassWithNs = $this->routeData['controller'];

        if (! class_exists($controllerClassWithNs)) {
            throw new ControllerNotFound("Controller Not Found");
        }

        $this->controller = new $controllerClassWithNs;
    }

    private function callActionOnController()
    {
        $action = $this->routeData['action'];

        if (! method_exists($this->controller, $action)) {
            throw new ActionNotFound("Action Method Not Found");
        }

        call_user_func_array([$this->controller, $action], [$this->data]);
    }
}