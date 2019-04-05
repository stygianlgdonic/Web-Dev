<?php

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
?>