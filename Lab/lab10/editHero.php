<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab10.css">
    <title>Edit Hero</title>
</head>


<?php
include_once 'dbconnect.php';

$id = $_REQUEST['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $real = $_POST["real"];
    $hero = $_POST["hero"];
    $power = $_POST["power"];

    $sqlAddHero = "UPDATE `marvel`.`heros` SET `real` = '" . $real . "' , `hero` = '" . $hero . "', `power` = '" . $power . "' WHERE id=" . $id;

    if (mysqli_query($connection, $sqlAddHero)) {
        echo "Hero Edited!";
        echo "<script>location.href='index.php';</script>";
        // header("refresh:2; url=index.php");
    } else {
        echo "Error " . mysqli_error($connection);
    }
}

$query = "SELECT * FROM `marvel`.`heros` WHERE id=" . "$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            session_start();
            if (isset($_SESSION['$row["real"]'])) {
                $yourName = $_SESSION['$row["real"]'];
            } else {
                $yourName = "null";
            }
            ?>
            <h1>Edit Hero</h1>
            <form action="editHero.php" method="POST">

                <input type="text" class="form-control" placeholder="Your Name" name="name" value="<?php echo $yourName; ?>">
                <hr>
                <input type="text" name="real" placeholder="Real Name" class="form-control" value="<?php echo $row['real']; ?>"><br>
                <input type="text" name="hero" placeholder="Code Name" class="form-control" value="<?php echo $row['hero']; ?>"><br>
                <input type="text" name="power" placeholder="Power" class="form-control" value="<?php echo $row['power']; ?>"><br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" class="btn btn-info float-left">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $_SESSION['$row["real"]'] = $_POST["name"];
            }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>