<?php

function myfunc($a, $b, $c = '!')
{
    $res = $a . $b . $c;
    return $res;
}

//$GLOBALS
//global
//$GLOBALS['name'];
function drawTable($a, $b, $c = 'green')
{
    echo "<table><tr>";
    for ($i = 1; $i <= $a; $i++) {
        for ($j = 1; $j <= $b; $j++)
            echo "<td>" . ($i * $j) . '</td>';
        if ($i != 10) echo "</tr><tr>";
    };
    echo "</tr></table>";

}

;
?>

