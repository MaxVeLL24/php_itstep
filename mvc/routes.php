<?php
$routes = [
    'page' => ['home', 'error']
];

function call($controller, $action)
{
    switch ($controller) {
        case 'page':
            require_once 'controller/PageController.php';
            $controller = new PageController();
            break;
    }
    $controller->{$action}();
}



if (array_key_exists($controller, $routes)) {
    if (in_array($action, $routes[$controller])) {
        call($controller, $action);
    } else {
        call('page', 'error');
    }
}
call($controller, $action);