<?php
session_start();
$q = 1;

if (!$_SESSION['right_answers']) {
    $_SESSION['right_answers'] = 0;
}
if ($_POST['q1'] == 'setcookie[cookie_name]') {
    $_SESSION['right_answers'] += $q;
}
if ($_POST['q2'] == 'session_start()') {
    $_SESSION['right_answers'] += $q;
}
if ($_POST['q3'] == '10') {
    $_SESSION['right_answers'] += $q;
}
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
<h1>ОПРОС</h1>
<form action="" method="post">
    <?php
    if (!$_POST['action']) {
        if (!$_SESSION['step']) {
            $_SESSION['step'] = 1;
        }
    } else if ($_POST['action'] == 'next') {
        $_SESSION['step'] += $q;
    } else if ($_POST['action'] == 'prev') {
        $_SESSION['step'] -= $q;
    }
    switch ($_SESSION['step']) {
        case 1:
            include 'q/q1.php';
            break;
        case 2:
            include 'q/q2.php';
            break;
        case 3:
            include 'q/q3.php';
            break;
        case 4:
            echo '<h3>' . 'You give' . ' ' . $_SESSION['right_answers'] . ' ' . 'right answers' . '</h3>';
            break;
    }
    ?>
    <br>
    <br>
    <input type="submit" value="prev" name="action">
    <input type="submit" value="next" name="action">
    <?php
    var_dump($_SESSION['right_answers']);
    ?>

</form>
</body>
</html>