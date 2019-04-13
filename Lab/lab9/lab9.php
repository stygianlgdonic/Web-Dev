<?php
$connection = mysqli_connect("localhost","root","usbw","demodb");

if(!$connection) {
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

if($pic_size < 10000000){
    $destination = "images/" . rand() . "-" . $pic_name;
    move_uploaded_file($pic_tmpname, $destination);

    $query = "INSERT INTO `demodb`.`users` (`user_name`, `user_Email`,
     `user_CNIC`, `user_Comments`, `user_Telephone`, `user_Picture`) VALUES (
     '$name', '$email', '$cnic', '$comment', '$tel', '$destination')";
    $result = mysqli_query($connection,$query);

    if(!$result){
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
    <title>result</title>
</head>
<body>
    <?php
        $connection = mysqli_connect("localhost", "root", "usbw", "demodb");
        if(!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM `users`";
        $result = mysqli_query($connection,$query);

        if(!$result) {
            echo mysqli_error($connection);
        }

        if(mysqli_num_rows($result) > 0){
            ?>
            <table border="1">
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User CNIC</th>
                    <th>Phone Number</th>
                    <th>User Comments</th>
                    <th>User Image</th>
                </tr>

                <?php
                while($row=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $row[1];?>
                        </td>
                        <td>
                            <?php echo $row[2];?>
                        </td>
                        <td>
                            <?php echo $row[3];?>
                        </td>
                        <td>
                            <?php echo $row[4];?>
                        </td>
                        <td>
                            <?php echo $row[5];?>
                        </td>
                        <td>
                            <img src="<?php echo $row[6]; ?>" height="100" width="100" />
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
</body>
</html>