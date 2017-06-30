<?php

class PageController
{
    public function home()
    {
        $hello = 'Hello World223232';
        require_once 'view/pages/home.php';
    }

    public function error()
    {
        require_once 'view/pages/error.php';
    }
}