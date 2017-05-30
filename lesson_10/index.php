<?php
$db = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'db_name' => 'myblog'
];

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
$query = mysqli_query($link, 'SELECT*FROM `menu`');
$menu = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
<nav>
    <ul>
        <?php
        foreach ($menu as $m) {
            echo "<li id='{$m['id']}'><a href='{$m['url']}'>{$m['title']}</a>";
            $parentquery = mysqli_query($link, "SELECT * FROM `menu` WHERE parent_id={$m['id']}");
            $sub_menu = mysqli_fetch_all($parentquery, MYSQLI_ASSOC);
            echo "<ul>";
            foreach ($sub_menu as $k) {
                echo "<li id='{$k['id']}'><a href='{$k['url']}'>{$k['title']}</a></li>";
            }
            echo "</ul>";
            echo "</li>";
        }
        ?>
    </ul>
</nav>
</body>
</html>