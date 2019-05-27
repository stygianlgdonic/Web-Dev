<?php
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "test"; // the name of the database that you are going to use for this project
$dbuser = "root"; // the username that you created, or were given, to access your database
$dbpass = "usbw"; // the password that you created, or were given, to access your database
$spoon = mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
	// Retrieve data from Query String
$age = $_GET['age'];

	// Escape User Input to help prevent SQL Injection
//$age = mysql_real_escape_string($age);
	//build query
$query = "SELECT * FROM users WHERE age <= $age";

	//Execute query
$qry_result = mysql_query($query, $spoon) or die(mysql_error());
	//Build Result String
$display_string = "<table style=\"background:black;color:white;\">";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Age</th>";
$display_string .= "<th>Email</th>";
$display_string .= "<th>id</th>";
$display_string .= "</tr>";
// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[name]</td>";
	$display_string .= "<td>$row[age]</td>";
	$display_string .= "<td>$row[email]</td>";
	$display_string .= "<td>$row[id]</td>";
	$display_string .= "</tr>";
}
//echo "Query: " . $query . "<br />";
$display_string .= "</table>";
echo $display_string;
?>