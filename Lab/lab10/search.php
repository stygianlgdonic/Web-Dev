<?php
include_once('dbconnect.php');
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

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('.search-box input[type="text"]').on("keyup input", function() {
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if (inputVal.length) {
                    $.get("backend-search.php", {
                        term: inputVal
                    }).done(function(data) {
                        resultDropdown.html(data);
                    });
                } else {
                    resultDropdown.empty();
                }
            });
            $(document).on("click", ".result p", function() {
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script> -->

</head>

<body class="padded">
    <?php
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
                <div class="col-md-8 search-box">
                    <h1>Search</h1>
                    <input type="text" class="form-control" onkeyup="ajaxFunction()" id="query" placeholder="Enter hero name you want to search for." autocomplete="off">
                    <div class="result"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Heros</h1>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="heros">
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

    </div>

    <script>
        function ajaxFunction() {
            var ajaxRequest; // The variable that makes Ajax possible!

            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            } catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }
            ajaxRequest.onreadystatechange = function() {
                if (ajaxRequest.readyState == 4) {
                    var ajaxDisplay = document.getElementById('heros');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }
            // Now get the value from user and pass it to
            // server script.
            var q = document.getElementById('query').value;
            var queryString = "?q=" + q;
            ajaxRequest.open("GET", "ajax.php" + queryString, true);
            ajaxRequest.send(null);
        }
    </script>
</body>

</html>