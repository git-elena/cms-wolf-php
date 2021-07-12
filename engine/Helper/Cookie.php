<?php

namespace Engine\Helper;

class Cookie{
    public static function set($key, $value, $time = 31536000){
        // добавляем куки
        setcookie($key, $value, time() + $time, '/');
    }

    public static function get($key){
        // читаем куки
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return null;
    }

    public static function delete($key){
        // удаляем куки
        if(isset($_COOKIE[$key])){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}
