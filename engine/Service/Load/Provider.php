<?php
namespace Engine\Service\Load;

use Engine\Service\AbstractProvider;
use Engine\Load;

class Provider extends AbstractProvider{
    public $serviceName = 'load';

    public function init(){
        $load = new Load();
        $this->di->set($this->serviceName, $load);
    }
}