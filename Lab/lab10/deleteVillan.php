<?php
include_once('dbconnect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $villanid = $_GET['id'];
    $sqlDeleteVillan = "DELETE FROM `villans` WHERE id=" . $villanid . ";";
    if (mysqli_query($connection, $sqlDeleteVillan)) {
        echo "Vilkan deleted";
        header("refresh:2; url=index.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}
