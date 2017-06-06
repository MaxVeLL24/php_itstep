<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

class User
{
    public $login = 'Maxim';
    public $password = '1111';

    public function getFullInfo()
    {
        echo 'USER:' . '<hr>' . $this->getLogin() . '<br>' . $this->getPassword();
    }

    public function getLogin()
    {
        return 'Login: ' . $this->login;
    }

    public function getPassword()
    {
        return 'Password: ' . $this->password;
    }

    public function __construct($login_data, $password_data)
    {
        $this->login = $login_data;
        $this->password = $password_data;
    }

    public function __clone()
    {
        $this->login = '';
        $this->password = '';
    }

    public function __destruct()
    {
        echo 'Object deleted';
    }
}

$user = new User('Mikola', '3333');

class Admin extends User
{
    public $role = 'Manager';

    public function __construct($login_data, $password_data, $role)
    {
        parent::__construct($login_data, $password_data);
        $this->role = $role;


    }
}

$admin = new Admin('vasya', '1111', 'admin');
var_dump($admin);
?>
</body>
</html>