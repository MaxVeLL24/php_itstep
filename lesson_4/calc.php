<?php
error_reporting(E_ALL);
if (isset($_GET['a'])) {
    $a = $_GET['a'];
} else {
    $a = 0;
}
if (isset($_GET['b'])) {
    $b = $_GET['b'];
} else {
    $b = 0;
}

//$a = isset(($_GET['a']) ? $a = $_GET['a'] & $_GET['a'] = 0;

echo $a + $b;

