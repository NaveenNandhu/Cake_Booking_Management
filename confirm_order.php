<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in!";
    exit;
}

// Get values from session
$user_id  = $_SESSION['user_id'];
$cake_id  = $_SESSION['cake_id'];
$flavour  = $_SESSION['flavour'];
$kg       = $_SESSION['kg'];
$quantity = $_SESSION['quantity'];
$price    = $_SESSION['price'];
$message  = $_SESSION['message'];
// Default if empty
if ($kg == "") { $kg = 1; }
if ($quantity == "") { $quantity = 1; }

// Insert into orders table
$sql = "INSERT INTO orders (user_id, cake_id, flavour, kg, quantity, message, price)
        VALUES ('$user_id', '$cake_id', '$flavour', '$kg', '$quantity', '$message', '$price')";

$insert_success = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .success-box {
            background: white;
            width: 420px;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            animation: fadeIn 0.8s ease-in-out;
        }
        .success-icon {
            font-size: 70px;
            color: green;
            margin-bottom: 15px;
        }
        .success-box h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }
        .success-box p {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
        }
        .btn-home {
            display: inline-block;
            padding: 12px 25px;
            background: #6c4ccf;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
        }
        .btn-home:hover {
            background: #cc5200;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

<div class="success-box">
    <?php if ($insert_success): ?>
        <div class="success-icon">✔</div>
        <h2>Order Placed Successfully!</h2>
        <p>Thank you for your order. Your delicious cake will be delivered soon!</p>
    <?php else: ?>
        <h2 style="color:red;">Order Failed!</h2>
        <p><?php echo mysqli_error($connection); ?></p>
    <?php endif; ?>

    <a href="customer_home.php" class="btn-home">Back to Home</a>
</div>

</body>
</html>
