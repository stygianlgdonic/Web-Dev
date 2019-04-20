<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab10.css">
    <title>Add Hero</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded padded">
                <h3 class="grey">Add Hero</h3>
                <hr>
                <form action="addHero.php" method="POST">
                    <input type="text" name="real" placeholder="Real Name" class="form-control"><br>
                    <input type="text" name="hero" placeholder="Code Name" class="form-control"><br>
                    <input type="text" name="power" placeholder="Power" class="form-control"><br>
                    <input type="submit" name="submit" class="btn btn-info float-right">
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
    $hero = $_POST["hero"];
    $power = $_POST["power"];

    $sqlAddHero = "INSERT INTO `marvel`.`heros` (`real`, `hero`,
     `power`) VALUES ('$real', '$hero', '$power')";

    if (mysqli_query($connection, $sqlAddHero)) {
        echo "Hero added!";
        // echo "<script>location.href='target-page.php';</script>";
        header("refresh:2; url=index.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}




mysqli_close($connection);

?>