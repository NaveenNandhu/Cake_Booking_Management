<?php
$connection = mysqli_connect("localhost", "root", "", "cake_shop");
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

