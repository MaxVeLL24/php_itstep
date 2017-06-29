<?php
require_once 'autoloader.php';

$id=isset($_POST['id'])?$_POST['id']:false;
product::addToCart($id);
echo 'true';