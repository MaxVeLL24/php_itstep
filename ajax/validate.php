<?php
require_once 'autoloader.php';
$is_user = User::validate($_POST['login']);
echo $is_user ? 'false' : 'true';