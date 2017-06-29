<?php

class Product
{
    public $id;
    public $name;
    public $decription;
    public $price;
    public $img;

    function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getDecription()
    {
        return $this->decription;
    }

    static public function getAllProducts(){
        $db = new DB();
        return $db->find("SELECT * FROM `products`")->fetch_all(1);
    }

    static public function getProductById($id){
        $db = new DB();
        return $db->find("SELECT * FROM `products` WHERE `id`='$id'")->fetch_assoc();
    }

    static public function addToCart($id){
        $productInCart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : [];
        $productInCart[] = (int)$id;
        setcookie('cart', serialize($productInCart));
        return self::getProductById($id);
    }

    static public function getProductsFromCart(){
        $products = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : false;
        if($products) {
            $db = new DB();
            $ids = implode(',', unserialize($products));
            return $db->find("SELECT * FROM `products` WHERE `id` in ($ids)")->fetch_all(1);
        }
    }

}