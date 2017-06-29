<?php
class Autoloader {
    public static $lastLoadedFile;

    static public function loaderProd($className) {
        self::$lastLoadedFile = $className . '.php';
        require_once self::$lastLoadedFile;
        self::log();
    }
    public function log() {
        echo 'File' . self::$lastLoadedFile . ' loaded<br>';
    }


}

spl_autoload_register(['Autoloader', 'loaderProd']);