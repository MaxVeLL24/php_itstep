<?php

class User
{
    public $login;
    public $password;
    public $name;
    public $age;


    public function __construct($login_data, $password_data, $name, $age)
    {
        $this->login = $login_data;
        $this->password = md5($password_data);
        $this->name = $name;
        $this->age = $age;
    }

    public function register()
    {
        if ($this->validate() == true) {
            $db = new DB();
            return $db->insert("INSERT INTO `users`(`login`, `password`, `name`, `age`, `created_at`) VALUES ('$this->login','$this->password','$this->name','$this->age',CURRENT_TIMESTAMP)");
        } else {
            echo "You have already registered";
        }
    }

    public function validate()
    {
        $db = new DB();
        $db->insert("SELECT * FROM `users` WHERE `login`='$this->login'");
        if (empty($db)) {
            return true;
        } else {
            return false;
        }
    }

}

?>