<?php
include_once('dbconnect.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $heroid = $_GET['id'];
    $sqlDeleteHero = "DELETE FROM `heros` WHERE id=" . $heroid . ";";
    if (mysqli_query($connection, $sqlDeleteHero)) {
        echo "Hero deleted";
        header("refresh:2; url=index.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}
