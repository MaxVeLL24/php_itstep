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
if ($_POST) {
    var_dump($_POST);
    if ($_POST['menu_delete']) {
        mysqli_query($link, "DELETE FROM `menu` WHERE `title`='{$_POST['menu_delete']}'");
    }
    mysqli_query($link, "INSERT INTO `menu`(`title`, `url`, `parent_id`) VALUES ('{$_POST['menu']}','{$_POST['url']}','{$_POST['parent-id']}')");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        form h3 {
            display: inline-block;
        }

        div.editor-border {
            border: 1px solid darkcyan;
            display: inline-block;
            padding: 20px;
        }
    </style>
</head>
<body>
<br>
<br>
<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#create">Create menu item</button>
<div id="create" class="collapse">
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
            <option name="parent-id" value="3">3</option>
        </select>
        <br>
        <button type="submit">Создать меню</button>
    </form>
</div>
<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#working">Deleting the items
</button>
<div id="working" class="collapse">
    <form action="" id="delete" method="post">
        <?php
        echo '<select style="width: 250px" name="menu_delete">';
        foreach ($menu as $d) {
            echo "<option name='delete'>" . $d['title'] . "</option>";
        }
        echo '</select>';
        ?>
        <button type='submit'>Delete</button>
    </form>
</div>
<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#edit">Editing the items
</button>
<br>
<br>
<br>
<div id="edit" class="collapse">
    <?php
    foreach ($menu as $d) {
        echo '<div class="editor-border">';
        echo '<form action="" id="edit" method="post">';
        echo "<h3>" . $d['title'] . "</h3><br>";
        echo "<input  name='title' value='{$d['title']}' placeholder='menu_title'><br>";
        echo "<input name='url' value='{$d['url']}' placeholder='url'><br>";
        echo "<input name='parent-id' value='{$d['parent_id']}' placeholder='parent-id'>";
        echo '<br>';
        echo "<button type='submit'>Edit</button>";
        echo '</form >';
        echo '</div>';
    }
    ?>

</div>

</body>
</html>
