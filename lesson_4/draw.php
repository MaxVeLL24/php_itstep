<?php
function drawTable($row, $col, $color = 'green')
{
    echo "<table><tr>";
    for ($i = 1; $i <= $row; $i++) {
        for ($j = 1; $j <= $col; $j++)
            echo "<td>" . ($i * $j) . '</td>';
        if ($i != 10) echo "</tr><tr>";
    };
    echo "</tr></table>";
}



