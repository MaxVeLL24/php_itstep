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
        mysqli_query($link, "INSERT INTO `users` (`login`, `password`, `role`, `create_date`) VALUES ('$login_data','$password_data','$role' ,CURRENT_TIMESTAMP)");
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
?>