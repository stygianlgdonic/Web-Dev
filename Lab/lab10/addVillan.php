<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab10.css">
    <title>Add Villan</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded padded">
                <h3 class="grey">Add Villan</h3>
                <hr>
                <form action="addVillan.php" method="POST">
                    <input type="text" name="real" placeholder="Real Name" class="form-control"><br>
                    <input type="text" name="villan" placeholder="Code Name" class="form-control"><br>
                    <input type="text" name="power" placeholder="Power" class="form-control"><br>
                    <input type="submit" name="submit" class="btn btn-danger float-right">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>
<?php
include_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $real = $_POST["real"];
    $villan = $_POST["villan"];
    $power = $_POST["power"];

    $sqlAddVillan = "INSERT INTO `marvel`.`villans` (`real`, `villan`,
     `power`) VALUES ('$real', '$villan', '$power')";

    if (mysqli_query($connection, $sqlAddVillan)) {
        echo "Villan added!";
        header("refresh:2; url=index.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}




mysqli_close($connection);

?>