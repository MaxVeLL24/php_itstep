<?php

/**
 * Created by PhpStorm.
 * User: osman.ramazanov
 * Date: 08.06.2017
 * Time: 20:34
 */
class User
{
    public $login;
    private $password;
    public $name;
    public $age;

    public function __construct($login, $password, $name, $age)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->age = $age;
    }

    public function register(){
        //todo connect to db and add user
        $db = new DB();
        $time = time();
        return $db->insert("INSERT INTO `users`(`login`, `password`, `name`, `age`, `created_at`) VALUES ('$this->login','$this->password','$this->name','$this->age','$time')");
    }

    static public function validate($login){
        $db = new DB();
        return $db->find("SELECT `id` FROM `users` WHERE `login`=$login;")->num_rows;
    }
}