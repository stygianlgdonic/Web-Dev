<?php
$connection = mysqli_connect("localhost", "root", "usbw", "demodb");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$cnic = $_POST["cnic"];
$tel = $_POST["tel"];
$comment = $_POST["comment"];

$pic_name = $_FILES['pic']['name'];
$pic_type = $_FILES['pic']['type'];
$pic_size = $_FILES['pic']['size'];
$pic_tmpname = $_FILES['pic']['tmp_name'];

$name = $fname . " " . $lname;

if ($pic_size < 10000000) {
    $destination = "images/" . rand() . "-" . $pic_name;
    move_uploaded_file($pic_tmpname, $destination);

    $query = "INSERT INTO `demodb`.`users` (`user_name`, `user_Email`,
     `user_CNIC`, `user_Telephone`, `user_Comments`, `user_Picture`) VALUES (
     '$name', '$email', '$cnic', '$comment', '$tel', '$destination')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }
}

mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab9.css">
    <title>Result</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded padded">
                <h3 class="grey">Data Entered Successfully</h3>
                <hr>
                <a href="lab9display.php" class="btn btn-info">Show Table</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>