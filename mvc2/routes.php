<?php

$routes = [
    'page'=>['home', 'error'],
    'post'=>['all', 'showone']
];

function call($controller, $action){
    switch ($controller){
        case 'page':
            require_once 'controller/PageController.php';
            $controller = new PageController();
            break;
        case 'post':
            require_once 'controller/PostController.php';
            $controller = new PostController();
            break;
    }

    $controller->{$action}();
}

if(array_key_exists($controller, $routes)){
    if(in_array($action, $routes[$controller])){
        call($controller, $action);
    } else {
        call('page', 'error');
    }
} else {
    call('page', 'error');
}