<?php
$db = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'db_name' => 'menu'
];

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
$query = mysqli_query($link, 'SELECT*FROM `menu`');
$menu = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    <ul class="">
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