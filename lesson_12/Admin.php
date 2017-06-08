<?php
class Admin extends User
{
    public $role = 'Admin';

    public function __construct($login_data, $password_data, $role)
    {
        $this->role = $role;
        parent::__construct($login_data, $password_data, $role);

    }
}