<?php
var_dump($_SERVER);
$log = 'log.txt';
$info[] = $_SERVER['HTTP_REFERER'];
$info[] = ' ' . '|' . ' ';
$info[] = $_SERVER['SCRIPT_FILENAME'];
$info[] = ' ' . '|' . ' ';
$info[] = date("d-m-Y-G:i:s");
$info[] = "\n";

file_put_contents($log, $info, FILE_APPEND);
?>