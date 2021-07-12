<?php

namespace Engine\Core\Router;

/**
 * DispatchedRoute
 */
class DispatchedRoute{
    private $controller;
    private $parameters;
    
    /**
     * Method __construct
     *
     * @param $controller 
     * @param $parameters = []
     *
     * @return void
     */
    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    public function getController(){
        return $this->controller;
    }

    public function getParameters(){
        return $this->parameters;
    }
}