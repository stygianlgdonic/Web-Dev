<?php
$connection = mysqli_connect("localhost", "root", "usbw", "marvel");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
