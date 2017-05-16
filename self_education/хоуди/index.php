<html<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<?php
$connection = mysqli_connect('127.0.0.1', 'root', '', 'local_test');
if ($connection == false) {
    echo 'Ne udalos podkluchitza<br>';
    echo mysqli_connect_error();
    exit();
}

$result = mysqli_query($connection, "SELECT * FROM `comments`");
?>
<ul>
    <?php
    while ($record = mysqli_fetch_assoc($result)) {
        echo '<li>' . $record['author'] . '</li>';
    }
    ?>
</ul>
<?php
mysqli_close($connection);
?>
</body>
</html>