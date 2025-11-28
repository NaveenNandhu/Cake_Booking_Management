<?php
include "db.php";  // Database connection

// Fetch all customers
$query = "SELECT * FROM users"; 
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Details</title>
    <link rel="stylesheet" href="nav.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f3ff;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #5a2ca0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background: #5a2ca0;
            color: white;
            padding: 12px;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        tr:hover {
            background: #f0e6ff;
        }
    </style>
</head>
<body>

<h2>Customer Details</h2>

<table>
    <tr>
        <th> User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Address</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?= $row['user_id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['phone']; ?></td>
            <td><?= $row['address']; ?></td>
        </tr>

    <?php } ?>

</table>
<a href="admin_dashboard.php">
<button class="back">Back</button></a>
</body>
</html>