<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

try{
    // Dependesy Injection
    $di = new DI();

    $services = require __DIR__ . '/Config/Service.php';

    foreach($services as $service){
        $provider = new $service($di);
        $provider->init();
    }

    

    $cms = new Cms($di);
    $cms->run();
}catch(\ErrorException $e){
    echo $e->getMessage();
}   