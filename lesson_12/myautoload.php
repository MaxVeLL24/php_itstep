<?php

class Autoloader{
    public static $lastLoaderFile;
    static public function loader($className){
        self::$lastLoaderFile=$className.'.php';
        require_once self::$lastLoaderFile;
        self::log();
    }
    public function log(){
        echo 'File'.self::$lastLoaderFile.' loaded <br>';
    }
}
spl_autoload_register(['Autoloader','loader']);