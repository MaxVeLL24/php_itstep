<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
move_uploaded_file($_FILES['name']['tmp_name'], $target_file);
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FileManager</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>FileManager</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
<table>
    <?php
    var_dump($_FILES);
    $dirToScan = isset($_GET['path']) ? $_GET['path'] : '.';
    $dir = scandir($dirToScan);
    array_shift($dir);
    foreach ($dir as $d) {

        if (is_file($d)) {

            echo "<tr><td style='padding-left: 15px'><form action='' method='post' style='float: right'><input type='hidden' name='remove' value='$d'><button class='delete' type='submit' style='color: red'>x</button></form>$d</td></tr>";
        } elseif (is_dir($d)) {
            echo "<tr><td><span></span><a href='/?path=" . $dirToScan . "/" . "$d" . "'>$d</a></td></tr>";
        }
    }
    ?>
</table>
</body>
</html>