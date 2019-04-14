<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lab9.css">
    <title>Search</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 rounded padded">
                <h3 class="grey">Search by Email</h3>
                <hr>
                <form action="lab9search.php" method="GET">
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                    <input type="submit" name="submit" class="btn btn-danger float-right margin-tb">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "usbw", "demodb");
                    if (!$connection) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $email = $_GET["email"];
                    $query = "SELECT * FROM `users` WHERE `user_Email` LIKE '$email'";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        echo mysqli_error($connection);
                    }

                    if (mysqli_num_rows($result) > 0) {
                        ?>
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


                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>