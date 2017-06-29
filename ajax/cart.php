<?php
require_once 'autoloader.php';
$id = isset($_POST['id']) ? $_POST['id'] : false;
$product = Product::addToCart($id);
echo json_encode($product);