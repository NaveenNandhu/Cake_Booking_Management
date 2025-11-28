<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    echo "Please login to view your orders.";
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_id DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0%;
        }
        .order-box {
            width: 70%;
            background: white;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .status-box {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
        .step {
            width: 25%;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            background: #ddd;
        }
        .active {
            background: #4CAF50;
            color: white;
        }
        .cancel-btn{
            float: right;
            color:white; 
            background:red;
            padding:5px 10px;
            border-radius:6px; 
            text-decoration:none;
            
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

<h2 style="text-align:center;">My Orders</h2>


<?php while($row = mysqli_fetch_assoc($result)) { ?>
<div class="order-box">
<tr>
    <td>
        <?php if ($row['status'] == 'Pending') { ?>
            <a href="cancel_order.php?id=<?= $row['order_id'] ?>"  class="cancel-btn"
               onclick="return confirm('Are you sure you want to cancel this order?');">
                Cancel
            </a>
        <?php } else { ?>
            <span style="color:grey;">Not Allowed</span>
        <?php } ?>
    </td>
</tr>
    <h3><?= $row['flavour'] ?> (<?= $row['kg'] ?> kg)</h3>
    <p><b>Quantity:</b> <?= $row['quantity'] ?></p>
    <p><b>Price:</b> ₹<?= $row['price'] ?></p>
    <p><b>Status:</b> <?= $row['status'] ?></p>

    <!-- TRACKING STEPS -->
    <div class="status-box">

        <div class="step <?= ($row['status'] == 'Pending' || $row['status'] == 'Confirmed' || $row['status'] == 'Out for Delivery' || $row['status'] == 'Delivered') ? 'active' : '' ?>">
            Pending
        </div>

        <div class="step <?= ($row['status'] == 'Confirmed' || $row['status'] == 'Out for Delivery' || $row['status'] == 'Delivered') ? 'active' : '' ?>">
            Confirmed
        </div>

        <div class="step <?= ($row['status'] == 'Out for Delivery' || $row['status'] == 'Delivered') ? 'active' : '' ?>">
            Out for Delivery
        </div>

        <div class="step <?= ($row['status'] == 'Delivered') ? 'active' : '' ?>">
            Delivered
        </div>

    </div>
</div>
<?php } ?>
<a href="customer_home.php">
<button  class="back">Back</button></a>

</body>
</html>