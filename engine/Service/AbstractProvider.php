<?php
namespace Engine\Service;

abstract class AbstractProvider{
    protected $di;

    public function __construct(\Engine\DI\DI $di){ // 
        //print_r("ww");
        $this->di = $di;
    }

    abstract function init();
}