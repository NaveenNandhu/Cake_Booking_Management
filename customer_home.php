<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="nav.css">
    <title>Customer Home</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f7f3ff;
        }
        /* Hero Section */
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px 60px;
        }
        .hero-text {
            max-width: 50%;
        }
        .hero-text h1 {
            font-size: 48px;
            color: #3d2a88;
        }
        .hero-text p {
            font-size: 18px;
            margin: 10px 0 20px;
        }
        .btn-order {
            padding: 14px 30px;
            background: #6c4ccf;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-order:hover {
            background: #573ab0;
        }

        /* Image */
        .hero img {
            width: 380px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        /* Cards */
        .section-title {
            text-align: center;
            font-size: 32px;
            color: #3d2a88;
            margin-top: 40px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px 60px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 6px 16px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            border-radius: 12px;
        }
        .card h3 { margin: 15px 0 5px; }

        /* Footer */
        .footer {
            background: #6c4ccf;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <h2>Cake Shop</h2>

    <div>
        <a href="customer_home.php">Home</a>

        <?php if (!isset($_SESSION['user_id'])) { ?>
            <!-- If NOT logged in -->
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>

        <?php } else { ?>
            <!-- If logged in -->
            <a href="my_orders.php">My Orders</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        <?php } ?>
    </div>
</div>

<?php if (isset($_SESSION['name'])) { ?>
    <h1 style="color:#3d2a88; font-size:36px;">Welcome, <span style="color:#6c4ccf;"><?php echo $_SESSION['name']; ?></span> 👋</h1>
<?php } else { ?>
    <h1>Welcome to Cake Shop 👋</h1>
<?php } ?>

    <!-- Search & Filter -->
    <form method="GET" action="search_result.php" style="margin-top:20px; display:flex; gap:15px;">
    <input type="text"  name="search"
           placeholder="Search cakes by name or flavour..."
           style="padding:12px 20px; width:280px; border-radius:8px; border:1px solid #ccc;">

    <button type="submit" 
            style="padding:12px 25px; background:#6c4ccf; border:none; color:white; border-radius:8px; cursor:pointer;">
        Search
    </button>
    <a href="customize.php"
            style="padding:12px 25px; background:#6c4ccf; border:none; color:white; border-radius:8px; cursor:pointer;">
        Customize
</a>
    </form>
    </div>
    <h2 class="section-title">Popular Cakes</h2>
    <div class="cards">
        <div class="card">
            <img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRrUVWLx70caUybwXOtJLC9cYoS0aPjR6F2xCN3JqK8ZANJsOLYjG4ceDZjgBKx_b119ce9JyLr86ngNN_s0dfkjrCwPoayTDTHA049QCq5" />
            <h3>Chocolate Cake</h3>
            <p>Rich and creamy chocolate delight.</p>
        </div>
        <div class="card">
            <img src=" https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRTmPPlUJRn0R1DMQUQMCR1-bwtZAF3OTJh2j_DYllzV47FDok1TW21oQnSnQFgzTgHU4h6gBcMOIMQd1sBD07Aeqa3Tn5o_BTt6745Bw76GmYBV1vrwjCd"
/>
            <h3>Strawberry Cake</h3>
            <p>Fresh and fruity strawberry flavor.</p>
        </div>
        <div class="card">
            <img src=" https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQGF9dJ6X1IQoG4Ih2ds1gSK5KGa81PUtvIIdXt7EkaRUUnmcHDl3fQIMJrXH4WkUg5LjKrr5jkBzgzotljbUVjM7jw4xmG1XSzUg4FJsxs"/>
            <h3>Black Forest</h3>
            <p>Classic taste loved by everyone.</p>
        </div>
    </div>

    <!-- available from Database -->
    <?php
        include 'db.php';
        $query = "SELECT * FROM cakes";
        $result = mysqli_query($connection, $query);
    ?>
    <h2 class="section-title">Available Cakes</h2>
    <div class="cards">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <img src="<?= $row['image']; ?>" />
                <h3><?= $row['flavour']; ?></h3>
                <p><?= $row['description']; ?></p>
                <p><strong>₹<?= $row['price']; ?></strong></p>
                <a href="cake_details.php? id=<?=$row['cake_id']; ?>"style="display:inline-block; background:#6c4ccf; color:white; padding:8px 15px; border-radius:6px; text-decoration:none;">
        View Details</a>
            </div>
        <?php } ?>
    </div>

    <div class="footer">© 2025 Cake Shop - All Rights Reserved</div>
</body>
</html>