<?php

echo "<table border=1>";

for($i = 1; $i < 11; $i++) {
    echo "<tr>";
    for($j = 1; $j < 6; $j++) {
        echo "<td>" . $i ."+" . $j . "=" . ($i+$j) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>