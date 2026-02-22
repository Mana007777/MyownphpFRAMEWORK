<?php
namespace app\Core;

use app\core\Application;

class Router
{
    public Request $request;
    protected array $routes = [];  
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            http_response_code(404);
            return 'Not found';
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        return call_user_func($callback);
    }

    protected function renderView($view)
    {
        $layoutContent = $this->layoutContent();
       include_once Application::$ROOT_DIR."/Views/$view.php";
    }

    protected function layoutContent(){}

}