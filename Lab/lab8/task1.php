<html>
    <body>
        <h1>Task 1</h1>
        <form action="task1.php" method="GET">
            <input type="number" name="counter" placeholder="No. of Rows for tables">
            <input type="submit" name="submit">
        </form>
    </body>
</html>

<?php
$num = $_GET["counter"];
echo "<table border=1>";

    for($i = 0; $i < $num; $i++) {
        echo "<tr><td> Web Engineering</td><td>" . $i*10 . "</td><td>80</td></tr>";
    }

echo "</table>";

?>

<?php

    echo "<h1>Task 2</h1>";

    $randArray = array();
    for ($i = 0; $i < 10; $i++) {
        $randArray[$i] = mt_rand();
    }

    $sum = 0;
    $count = 0;
    foreach($randArray as $value) {
        $sum += $value;
        $count++;
    }

    echo "Count = " . $count;
    echo "<br>Sum = " . $sum;
    echo "<br>Avg = " . $sum/$count;
    
    sort($randArray);
    echo "<br>Highest Five numbers are: <br>";
    for($i = 0; $i < 5; $i++){
        echo " " . $randArray[$i] . "<br>";
    }

    rsort($randArray);
    echo "<br>Lowest Five numbers are: <br>";
    for($i = 0; $i < 5; $i++){
        echo " " . $randArray[$i] . "<br>";
    }

    echo "<h1>Task 3</h1>";
    echo "<table border=1>";

for($i = 1; $i < $_GET["counter"]+1; $i++) {
    echo "<tr>";
    for($j = 1; $j < 6; $j++) {
        echo "<td>" . $i ."+" . $j . "=" . ($i+$j) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>