<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;

class Cms {
    private $di;
    public $router;

    public function __construct($di)
    {
        $this->di = $di;  
        $this->router = $this->di->get('router');
    }

    public function run(){
        try{
            //$this->router->add('home', '/cms.wolf/', 'HomeController:index');
            //$this->router->add('news', '/cms.wolf/news/', 'HomeController:news');
            //$this->router->add('news_single', '/cms.wolf/news/(id:int)', 'HomeController:news');
            require_once __DIR__ . '/../' .mb_strtolower(ENV). '/Route.php';
            
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

//var_dump($routerDispatch);
            if($routerDispatch == null){
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            
            $controller = '\\' .ENV. '\\Controller\\' . $class;

 //       var_dump($controller);

            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        }catch(\Exception $e){
            echo $e->getMessage();
            exit;
        }
        
    }
}