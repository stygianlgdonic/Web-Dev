<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="form2dis.css">
    <title>Details</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2 col-md-2"></div>
            <div class="col-sm-8 col-md-8 rounded padded">
                <div class="row text-center">

                    <div class="col-sm-12 col-md-12">
                        <h3 class="grey">Application Form Data</h3>
                        <hr>
                    </div>

                </div>

                <div>
                    <?php

                    $postname = $_GET["postname"];
                    $dept = $_GET["dept"];
                    $campus = $_GET["campus"];
                    $fullname = $_GET["fullname"];
                    $fathername = $_GET["fathername"];
                    $cnic = $_GET["cnic"];
                    $dob = $_GET["dob"];
                    $email = $_GET["email"];
                    $gender = $_GET["gender"];
                    $postaladd = $_GET["postaladd"];
                    $city = $_GET["city"];
                    $officenum = $_GET["officenum"];
                    $resnum = $_GET["resnum"];
                    $mobnum = $_GET["mobnum"];

                    echo "<p>Post Name: $postname</p><br>";
                    echo "<p>Department: $dept</p><br>";
                    echo "<p>Campus: $campus</p><br>";
                    echo "<p>Full Name: $fullname</p><br>";
                    echo "<p>Father Name: $fathername</p><br>";
                    echo "<p>CNIC: $cnic</p><br>";
                    echo "<p>Date of Birth: $dob</p><br>";
                    echo "<p>Email: $email</p><br>";
                    echo "<p>Gender: $gender</p><br>";
                    echo "<p>Postal Address: $postaladd</p><br>";
                    echo "<p>City: $city</p><br>";
                    echo "<p>Office Number: $officenum</p><br>";
                    echo "<p>Residence Number: $resnum</p><br>";
                    echo "<p>Mobile Number: $mobnum</p><br>";

                    ?>
                </div>

            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
    </div>

</body>
</html>

