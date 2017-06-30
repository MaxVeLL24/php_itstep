<?php

class DB
{
    public static $instance;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    static public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=myblog', 'root', '');
        }
        return self::$instance;
    }
}