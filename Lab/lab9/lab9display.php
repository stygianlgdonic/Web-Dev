<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab9.css">
    <title>result</title>
</head>

<body>
    <?php
    $connection = mysqli_connect("localhost", "root", "usbw", "demodb");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM `users`";
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
                    <h1>Users Table</h1>
                    <a href="lab9search.php" class="btn btn-primary float-right margin-tb">Search Users by Email</a>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-dark">
                        <tr>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User CNIC</th>
                            <th>Phone Number</th>
                            <th>User Comments</th>
                            <th>User Image</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
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
                                    <?php echo $row[4]; ?>
                                </td>
                                <td>
                                    <?php echo $row[5]; ?>
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
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</body>

</html>