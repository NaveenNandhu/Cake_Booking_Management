<?php
include "db.php";

$query = "SELECT * FROM orders";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #003399;
            color: white;
        }
        .btn {
            padding: 6px 12px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn:disabled {
            background: gray;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Admin - Manage Orders</h2>

<table>
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Cake ID</th>
        <th>Flavour</th>
        <th>Message</th>
        <th>Kg</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['order_id']; ?></td>
        <td><?= $row['user_id']; ?></td>
        <td><?= $row['cake_id']; ?></td>
        <td><?= $row['flavour']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['kg']; ?></td>
        <td><?= $row['quantity']; ?></td>
        <td><?= $row['price']; ?></td>
        <td><?= $row['status']; ?></td>
        <td>
    <?php if($row['status'] == 'Pending') { ?>
        <a href="update_status.php?id=<?= $row['order_id']; ?>&status=Confirmed">
            <button class="btn">Confirm</button>
        </a>

    <?php } elseif($row['status'] == 'Confirmed') { ?>
        <a href="update_status.php?id=<?= $row['order_id']; ?>&status=Out for Delivery">
            <button class="btn">Out for Delivery</button>
        </a>

    <?php } elseif($row['status'] == 'Out for Delivery') { ?>
        <a href="update_status.php?id=<?= $row['order_id']; ?>&status=Delivered">
            <button class="btn">Delivered</button>
        </a>

    <?php } else { ?>
        <button class="btn" disabled>Completed</button>
    <?php } ?>
</td>
    </tr>
    <?php } ?>

</table>
<a href="admin_dashboard.php">
<button class="back">Back</button></a>
</body>
</html>