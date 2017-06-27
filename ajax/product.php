<?php

class Product
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $img;

    function __construct()
    {

    }

    public function getDescription()
    {
        return $this->description;
    }

    static public function getAllProducts()
    {
        $db = new DB();
        return $db->find("SELECT * FROM `products`")->fetch_all(1);
    }

    static public function setId($id)
    {
        $db = new DB();
        return $db->find("SELECT * FROM `products` WHERE  `id`='$id'")->fetch_assoc(1);
    }

    static public function addToCart($id)
    {
        $productInCart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
        if ($productInCart) {
            $productInCart[] = $id;
            setcookie('cart', serialize($productInCart));
        }
    }

    static public function getProductsFromCart()
    {
        $products = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : false;
        if ($products) {
            $db = new DB();
            $ids = implode(unserialize($products));
            $db->find("SELECT * FROM `procducts` WHERE `id` IN ($ids)")->fetch_all(1);
        }
    }
}
