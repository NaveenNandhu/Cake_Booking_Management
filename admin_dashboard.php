<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f6f2ff;
        }

        /* TOP NAVBAR */
        .navbar {
            width: 100%;
            background: #6a0dad;
            padding: 20px;
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            letter-spacing: 2px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        /* CONTAINER */
        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        /* DASHBOARD BOXES */
        .box {
            width: 260px;
            height: 180px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            border-top: 8px solid #6a0dad;
        }

        .box:hover {
            transform: scale(1.05);
            background: #f1e4ff;
        }

        a {
            text-decoration: none;
            color: #333;
        }
    </style>

</head>
<body>

    <!-- NAVIGATION BAR -->
    <div class="navbar">
        🍰 Cake Shop - Admin Panel
    </div>

    <!-- SQUARE BOXES -->
    <div class="container">

        <a href="view_customer_details.php">
            <div class="box">View Customers</div>
        </a>

        <a href="view_customer_reviews.php">
            <div class="box">View Reviews</div>
        </a>

        <a href="add_cake.php">
            <div class="box">Add Cakes</div>
        </a>

        <a href="view_cakes.php">
            <div class="box">View Cakes</div>
        </a>

        <a href="view_customer_orders.php">
            <div class="box">Orders</div>
        </a>

    </div>

</body>
</html>
