<?php
require 'autoloader.php';
require 'myautoload.php';
$user=new User('John','123');
$use2=new Admin('sadasda','12sadsa3','manager');
var_dump($user);
var_dump($use2);