<?php
session_start();
include "db.php";

// Check login
if (!isset($_SESSION['user_id'])) {
    echo "Not logged in!";
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .container {
            width: 350px;
            margin: 60px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .container h2 { text-align: center; }
        .item { margin: 10px 0; font-size: 18px; }
        .label { font-weight: bold; }
        .btn-edit {
    background: #ff6600;
    color: white;
    padding: 12px 25px;
    display: block;
    width: 85%;
    text-align: center;
    margin-top: 15px;
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
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

<div class="container">
    <h2>My Profile</h2>

    <div class="item"><span class="label">User ID:</span> <?= $user['user_id'] ?></div>
    <div class="item"><span class="label">Name:</span> <?= $user['name'] ?></div>
    <div class="item"><span class="label">Email:</span> <?= $user['email'] ?></div>
    <div class="item"><span class="label">Phone:</span> <?= $user['phone'] ?></div>
    <div class="item"><span class="label">Address:</span> <?= $user['address'] ?></div>
    <a href="edit_profile.php" class="btn-edit">Edit Details</a>
</div>
<a href="customer_home.php">
<button class="back">Back</button></a>

</body>
</html>