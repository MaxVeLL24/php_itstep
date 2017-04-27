<?php
//header('Location: http://fb.com')
if (empty($_POST)) {
    $nopost = true;
} else {
    require_once 'draw.php';
    $row = isset($_POST['row']) ? $_POST['row'] : '';
    $col = isset($_POST['col']) ? $_POST['col'] : '';
    $color = isset($_POST['color']) ? $_POST['color'] : '';
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
<!--<body>-->
<!--<form action="calc.php" method="get">-->
<!--    <input type="text" name="a" value="12">-->
<!--    <input type="text" name="b" value="15">-->
<!--    <input type="submit" value="Send">-->
<!--</form>-->
<!--<a href="calc.php?a=20&b=341">Get what 20+341 will be</a>-->

<form action="" method="post">
    <label>Enter rows
        <input type="number" name="row">
    </label>
    <label>Enter cols
        <input type="number" name="col">
    </label>
    <label>Enter color
        <input type="color" name="color">
    </label>
    <button type="submit">Draw table</button>
</form>

<div class="table">
    <?php
    if (!$nopost) {
        drawTable($row, $col, $color);
    }
    ?>
</div>
</body>
</html>