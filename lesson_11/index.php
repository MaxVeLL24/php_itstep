<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<?php

class User
{
    public $login = 'Maxim';
    public $password = '1111';
    private $host = '127.0.0.1';
    private $user = 'root';
    private $db_password = '';
    private $db_name = 'user_data';


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

    public function __construct($login_data, $password_data, $role = 'user')
    {
        $this->login = $login_data;
        $this->password = $password_data;
        $link = mysqli_connect($this->host, $this->user, $this->db_password, $this->db_name);
        $query = mysqli_query($link, "INSERT INTO `users` (`login`, `password`, `role`, `create_date`) VALUES ('$login_data','$password_data','$role' ,CURRENT_TIMESTAMP)");
    }

    public function __clone()
    {
        $this->login = '';
        $this->password = '';
    }

    public function __destruct()
    {
    }
}

$user = new User('Mikola', '3333');

class Admin extends User
{
    public $role = 'Manager';

    public function __construct($login_data, $password_data, $role)
    {
        $this->role = $role;
        parent::__construct($login_data, $password_data, $role);

    }
}

$admin = new Admin('vasya', '1111', 'admin');
$admin = new Admin('sadas', '21312', 'moderator');
$admin = new Admin('vasasdasdya', '1adasdas111', 'HR manager');
//var_dump($admin);
?>
</body>
</html>