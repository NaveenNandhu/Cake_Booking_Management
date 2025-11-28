<?php
session_start();
include "db.php";

$user_id = $_SESSION['user_id'];

$cake_id = $_POST['cake_id'];
$shape   = $_POST['shape'];
$color   = $_POST['flavour'];
$weight  = $_POST['kg'];
$quantity= $_POST['quantity'];
$message = $_POST['message'];

$toppings = "";
if (!empty($_POST['toppings'])) {
    $toppings = implode(", ", $_POST['toppings']);
}

// Insert into table
$sql = "INSERT INTO customizations (user_id, cake_id, shape, flavour, kg, quantity, message, toppings)
        VALUES ('$user_id', '$cake_id', '$shape', '$flavour', '$kg', '$quantity', '$message', '$toppings')";

mysqli_query($connection, $sql);

echo "<script>
alert('Ordered placed successfully!');
window.location='customer_home.php';
</script>";
?>