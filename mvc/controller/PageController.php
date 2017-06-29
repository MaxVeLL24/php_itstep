<?php
class PageController{
    public function home(){
        $hello='<h1>Hello world</h1>';
        require_once 'view/pages/home.php';
    }
    public function error(){
        require_once 'view/pages/error.php';
    }
}