<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab10.css">
    <title>result</title>
</head>

<body class="padded">
    <?php
    include_once('dbconnect.php');

    $query = "SELECT * FROM `heros`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>heros Table</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Real Name</th>
                            <th>Code Name</th>
                            <th>Super Power</th>
                            <th>Action</th>
                            <th>Last Edited by</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row[0]; ?>
                                </td>
                                <td>
                                    <?php echo $row[1]; ?>
                                </td>
                                <td>
                                    <?php echo $row[2]; ?>
                                </td>
                                <td>
                                    <?php echo $row[3]; ?>
                                </td>
                                <td>
                                    <?php echo '<a class="greenlink" href="deleteHero.php?id=' . $row['id'] . '">Delete</a> 
                                    - <a class="greenlink" href="editHero.php?id=' . $row['id'] . '">Edit</a>'; ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($_SESSION["$row[real]"])) {
                                        echo $_SESSION["$row[real]"];
                                    } else {
                                        echo "None";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                }
                ?>

                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!-- VILLAN -->

    <?php
    $query = "SELECT * FROM `villans`";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo mysqli_error($connection);
    }

    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Villans Table</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Real Name</th>
                            <th>Code Name</th>
                            <th>Super Power</th>
                            <th>Action</th>
                            <th>Last Edited by</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row[0]; ?>
                                </td>
                                <td>
                                    <?php echo $row[1]; ?>
                                </td>
                                <td>
                                    <?php echo $row[2]; ?>
                                </td>
                                <td>
                                    <?php echo $row[3]; ?>
                                </td>
                                <td>
                                    <?php echo '<a class="greenlink" href="deleteVillan.php?id=' . $row['id'] . '">Delete</a>
                                     - <a class="greenlink" href="editVillan.php?id=' . $row['id'] . '">Edit</a>'; ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($_SESSION["$row[real]"])) {
                                        echo $_SESSION["$row[real]"];
                                    } else {
                                        echo "None";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                }
                ?>

                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row text-center padded">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="addHero.php" class="btn btn-info">Add New Hero</a>
                <a href="addVillan.php" class="btn btn-danger">Add New Villan</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>