<?php
session_start();

// RECEIVE VALUES
$_SESSION['cake_id']  = $_POST['cake_id'];
$_SESSION['flavour']  = $_POST['flavour'];
$_SESSION['kg']       = $_POST['kg'];
$_SESSION['quantity'] = $_POST['quantity'];
$_SESSION['message']  = $_POST['message'];
$_SESSION['price']    = $_POST['price'];

// STORE IN VARIABLES ALSO
$cake_id  = $_SESSION['cake_id'];
$flavour  = $_SESSION['flavour'];
$kg       = $_SESSION['kg'];
$quantity = $_SESSION['quantity'];
$message  = $_SESSION['message'];
$price    = $_SESSION['price'];

include "db.php";  // your database connection

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email, phone, address FROM users WHERE user_id='$user_id'";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="nav.css">
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
}

.order-box {
    width: 50%;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.order-box h2 {
    text-align: center;
    color: #444;
    margin-bottom: 20px;
}

.order-item {
    font-size: 18px;
    margin: 10px 0;
}

.order-item span {
    color: #ff6600;
    font-weight: bold;
}

.btn-confirm {
    background: #6c4ccf;
    color: white;
    padding: 12px 25px;
    display: block;
    width: 90%;
    text-align: center;
    margin-top: 25px;
    text-decoration: none;
    border-radius: 6px;
    font-size: 18px;
}
</style>
</head>
<body>
<div class="navbar">
        <h2>Cake Shop</h2>
        <div>
            <a href="customer_home.php">Home</a>
            <a href="my_orders.php">My Orders</a>
            <a href="edit_profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>


<div class="order-box">
    <h2>Your Details</h2>

    <p class="order-item"><span>Name:</span> <?php echo $user['name']; ?></p>
    <p class="order-item"><span>Email:</span> <?php echo $user['email']; ?></p>
    <p class="order-item"><span>Phone:</span> <?php echo $user['phone']; ?></p>
    <p class="order-item"><span>Address:</span> <?php echo $user['address']; ?></p>

    <a href="confirm_order.php" class="btn-confirm">Confirm Order</a>
</div>
<a href="customer_home.php">
<button class="back">Back</button></a>
</body>
</html>