<?php

namespace Engine\Helper;

class Common{
    static function isPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    /**
     * Method getMethod
     *
     * @return $_SERVER['REQUEST_METHOD'] // 'POST'
     */
    static function getMethod(){return $_SERVER['REQUEST_METHOD'];
    }
    
    /**
     * Method getPathUrl
     *
     * @return $_SERVER['REQUEST_URI']    0 to '?'
     */
    static function getPathUrl(){
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUrl, '?')){
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }
}