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
if ($_POST) {
    var_dump($_POST);
    mysqli_query($link, "INSERT INTO `menu`(`title`, `url`, `parent_id`) VALUES ('{$_POST['menu']}','{$_POST['url']}','{$_POST['parent-id']}')");
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
<form id="menu-form" action="" method="post">
    <br>
    <input type="text" name="menu" value="" placeholder="menu name">
    <br>
    <input type="text" name="url" value="" placeholder="url">
    <br>
    <select name="parent-id">
        <option name="parent-id" value="0">0</option>
        <option name="parent-id" value="1">1</option>
        <option name="parent-id" value="2">2</option>
    </select>
    <br>
    <button type="submit">Создать меню</button>
</form>
<br>
<br>
<br>
<form action="" id="delete" method="post">
    <h3>Deleting menu</h3>
    <select name="delete" id="">
        <?php
        foreach ($menu as $d) {
            echo "<option>{$d['title']}</option>";
        }
        ?>
    </select>
    <button type="submit">Delete</button>
</form>
</body>
</html>
