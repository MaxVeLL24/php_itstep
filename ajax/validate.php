<?php

if(!empty($_POST["email"])) {
    $result = mysqli_query("SELECT * FROM `users` WHERE `login`='$this->login'");
    if (empty($result)) {
        echo 'login avalible' ;
    } else {
        echo 'login already exist' ;
    }
}