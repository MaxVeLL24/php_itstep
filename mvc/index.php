<?php
//require_once 'autoloader.php';
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'page';
    $action = 'home';
}

require_once 'view/layout.php';

