<?php
//
//$login = isset($_POST['login']) ? trim(strip_tags($_POST['login'])) : null;
//$login = isset($_POST['password']) ? trim(strip_tags($_POST['password'])) : null;
//
//if (!is_null($login)) {
//    setcookie('login', $login, time() + 36000);
//}
//
//$isLogged = isset($_COOKIE['login']) || $login;

//$counter = isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 0;
//setcookie('counter', ++$counter);


//$count = 0;
//setcookie('count', $count);
//$count++;

//ob_start();
//echo 'hello';
//$lastvisit = $_COOKIE['lastvisit'] ? $_COOKIE['lastvisit'] : '';
//setcookie('lastvisit', time());
//ob_flush();

session_start();
?>
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

<?php //if ($login): ?>
<!--    <h1>Hello, --><? //= $isLogged; ?><!--</h1>-->
<?php //else: ?>
<!--    <form action="" method="POST">-->
<!--        <input type="text" name="login">-->
<!--        <input type="password" name="password">-->
<!--        <input type="submit" value="register">-->
<!--    </form>-->
<?php //endif;
//?>

<!--<h1>You have - --><?php //echo $counter ?><!-- visitors today</h1>-->
<?php

if ($lastvisit) {
    echo "<h1>Last visit:" . date('j.m.Y H:i:s', $lastvisit) . "</h1>";
} else {
    echo "<h1>Hello. darling dear!</h1>";
}
?>
</body>
</html>