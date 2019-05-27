<?php
include_once('dbconnect.php');
session_start();
$q = isset($_GET["q"]) ? $_GET["q"] : "";
$query = "SELECT * FROM `heros` WHERE `real` like '%" . $q . "%' OR `hero` like '%" . $q . "%' OR `power` like '%" . $q . "%'";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo mysqli_error($connection);
}

if (mysqli_num_rows($result) > 0) :
    ?>
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
    ?>
    </table>

<?php
endif;
?>