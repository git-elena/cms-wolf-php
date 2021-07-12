<?php
namespace Engine\Core\Router;

class Router{
    private $routes = [];
    private $dispatcher;
    private $host;

    public function __construct($host)
    {
        $this->host = $host;
    }
//   $this->router->add('login', '/cms.wolf/admin/login', 'LoginController:form');
//   $this->router->add('home', '/cms.wolf', 'HomeController:index');    

    /**
     * Method add 
     *
     * @param $key          'login'                   'home'
     * @param $pattern      '/cms.wolf/admin/login'   '/cms.wolf/'
     * @param $controller   'LoginController:form'    'HomeController:index'
     * @param $method = 'GET'
     * 
     *  $this->routes[$key] = [$pattern,  $controller,  $method]
     */
    public function add($key, $pattern, $controller, $method = 'GET'){
        
        $this->routes[$key] = [             // 'home'
            'pattern'    => $pattern,       // '/cms.wolf/'
            'controller' => $controller,    // 'HomeController:index'
            'method'     => $method         // 'GET'
        ];
    }
// $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());    
    /**
     * Method dispatch
     *
     * @param $method 
     * @param $uri 
     *
     * @return void
     */
    public function dispatch($method, $uri){
        return $this->getDispatcher()->dispatch($method, $uri);
    }
    
    /**
     * Method getDispatcher
     *
     * @return $this->dispatcher = new UrlDispatcher();
     */
    public function getDispatcher(){
        if($this->dispatcher == null){
            $this->dispatcher = new UrlDispatcher();

            foreach($this->routes as $route){
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}