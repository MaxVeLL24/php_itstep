<?php

$config = [
    'logfile' => 'logs/transitions.log'
];

$db = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => '',
    'db_name' => 'myblog'
];

$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
$parentPathArr = explode('\\', $path);
array_pop($parentPathArr);
$parentPath = implode('\\', $parentPathArr);
if (isset($_FILES['newfile'])) {
    move_uploaded_file($_FILES['newfile']['tmp_name'], $path . '\\' . $_FILES['newfile']['name']);
}

if (isset($_POST['remove'])) {
    $toRemove = $_POST['remove'];
    if (is_dir($toRemove)) {
        rmdir($toRemove);
    } elseif (is_file($toRemove)) {
        unlink($toRemove);
    }
}
/*** DB ***/
$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$row['name'] = isset($_POST['name']) ? $_POST['name'] : '';
$row['title'] = isset($_POST['title']) ? $_POST['title'] : '';
$row['content'] = isset($_POST['content']) ? $_POST['content'] : '';
$row['rating'] = isset($_POST['rating']) ? $_POST['rating'] : '';
if (isset($_FILES['image'])) {
    $imagePath = 'uploads/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    $row['image'] = $imagePath;
}

$query = mysqli_query($link, "INSERT INTO `reviews`(`name`, `title`, `content`, `rating`, `created_at`, `updated_at`, `img_url`) VALUES ('{$row['name']}','{$row['title']}','{$row['content']}','{$row['rating']}',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP ,'{$row['image']}')");
var_dump($query);
$query_select = mysqli_query($link, 'SELECT * FROM reviews');
$result = mysqli_fetch_all($query_select, MYSQLI_ASSOC);
mysqli_close($link);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://use.fontawesome.com/debef5cbce.js"></script>
    <style>
        a {
            color: #1873b4;
            text-decoration: none;
        }

        a.navigator {
            display: block;
        }

        a.navigator i {
            margin-right: 5px;
            color: #F2BA34;
        }

        a.navigator.file i {
            margin-right: 5px;
            color: grey;
        }

        a:hover {
            color: #e17009;
        }

        table {
            width: 100%;
        }

        .path-line input {
            width: 100%;
        }

        #fileuploader {
            display: none;
        }

        .toolbar label {
            color: #1873b4;
        }

        .toolbar label:hover {
            color: #e17009;
        }

        button {
            background: none;
            border: none;
            color: #1873b4;
            cursor: pointer;
        }

        button:hover {
            color: #e17009;
        }
    </style>
</head>
<body>
<table>
    <?php
    $i = 0;
    foreach ($result as $res) {
        if (!$i) {
            echo '<tr>';
            foreach ($res as $k => $v) {
                echo "<td>$k</td>";
            }
            echo '</tr>';
        }
        echo '<tr>';
        foreach ($res as $k => $v) {
            if ($k == 'img_url') {
                echo "<td><img src='$v' alt=''></td>";
            } else
                echo "<td>$v</td>";
        }
        echo '</tr>';

        $i++;
    }
    ?>
</table>

<form action="" method="post" style="text-align: center" enctype="multipart/form-data">
    <h2>Fill the review</h2>
    <label>Select review picture<br>
        <input type="file" name="image"><br><br>

    </label>
    <label>Enter name<br>
        <input type="text" name="name"><br><br>
    </label>
    <label>Enter Title<br>
        <input type="text" name="title"><br><br>
    </label>
    <label>Enter review text<br>
        <textarea type="text" name="content">
    </textarea><br><br>
    </label>
    <label>Rating<br>
        <select name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </label><br><br>
    <button type="submit">Send Review</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('#fileuploader').change(function (e) {
        $(this).parents('form').submit();
    });
</script>
</body>
</html>

