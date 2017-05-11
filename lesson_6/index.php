<?php
session_start();
if (!isset($_POST['q'])) {
    $step = 1;
    $title = 'NEW';
} else {
    $step = $_POST['q'];
    $title = $_POST['title'];
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
<h1><?= $title ?></h1>
<form action="" method="post">
    <?php
    //    $count = 1;
    //    if ($_POST['action'] == 'next') {
    //        $count = $count + 1;
    //        var_dump($count);
    //    } else if ($_POST['action'] == 'prev') {
    //        $count = $count - 1;
    //        var_dump($count);
    //    }
    //    $_SESSION['step'] = $count;
    switch ($step) {
        case 1:
            include 'q/q1.php';
            break;
        case 2:
            include 'q/q2.php';
            break;
        case 3:
            include 'q/q3.php';
            break;
    }
    ?>
    <br>
    <br>
    <input type="submit" value="prev" name="action">
    <input type="submit" value="next" name="action">
</form>
</body>
</html>