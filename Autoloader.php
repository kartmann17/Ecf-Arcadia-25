<?php

namespace App;

class Autoloader
{
    static function register()
    {
    spl_autoload_register([
        __CLASS__, 
        'Autoload'
    ]);
    }
    
    static function Autoload($class)
    {
        $class = str_replace(__NAMESPACE__.'\\', '', $class);
        $class = str_replace('\\','/', $class);
        $file = __DIR__.'/' .$class .'.php';
        if(file_exists($file)){
            require_once $file;
        }else{
           echo "vous etes tromper d'accès";
        } 
    }

}
