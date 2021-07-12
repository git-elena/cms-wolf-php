<?php

namespace Engine\Core\Router;

class UrlDispatcher{
    private $method = [
        'GET', 'POST'
    ];

    private $routes = [
        'GET'  => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    public function addPattern($key, $pattern){
        $this->patterns[$key] = $pattern;
    }
    
    /**
     * Method routes
     *
     * @param $method [GET, POST]
     * 
     * @return []
     */
    private function routes($method){
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }
    
    /**
     * Method register
     *
     * @param $method [GET, POST]
     * @param $pattern $pattern [explicite description]
     * @param $controller $controller [explicite description]
     *
     * @return void
     */
    public function register($method, $pattern, $controller){
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }

    private function convertPattern($pattern){
        if(strpos($pattern, '(') === false){
            return $pattern;
        }
        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    private function replacePattern($matches){
        //var_dump($matches);
/** $matches = Array( 
    *       [0] => (id:int)
    *       [1] => id
    *       [2] => int)*/

        //echo '<br>(?<' .$matches[1]. '>' .strtr($matches[2], $this->patterns). ')';
        return '(?<' .$matches[1]. '>' .strtr($matches[2], $this->patterns). ')';
    }

    private function processParam($parameters){
        foreach($parameters as $key => $value){
            if(is_int($key)){
                unset($parameters[$key]);
            }
        }
        return $parameters;
    }    
    /**
     * Method dispatch
     *
     * @param $method [GET, POS]
     * @param $uri 
     *
     * @return void
     */
    public function dispatch($method, $uri){
        $routes = $this->routes(strtoupper($method));
        if(array_key_exists($uri, $routes)){
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }
    
    /**
     * Method doDispatch
     *
     * @param $method ["GET", "POST"]
     * @param $uri "http://..to '?'
     *
     * @return new DispatchedRoute($controller, $this->processParam($parameters))
     */
    private function doDispatch($method, $uri){
        foreach($this->routes($method) as $route => $controller){
            $pattern = '#^' . $route . '$#s';
            if(preg_match($pattern, $uri, $parameters)){
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
    }
}