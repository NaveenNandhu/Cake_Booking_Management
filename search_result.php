<?php
session_start();
include 'db.php';

// Get the search value
$search = "";
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

// If search is empty, redirect back to home
if ($search == "") {
    header("Location: customerhome.php");
    exit();
}

// Search query based on your database column
$query = "SELECT * FROM cakes WHERE flavour LIKE '%$search%'";

$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        body { font-family: Poppins; background:#f7f3ff; margin:0; }
        .section-title {
            text-align:center; font-size:32px; color:#3d2a88; margin-top:40px;
        }
        .cards {
            display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px; padding:40px 60px;
        }
        .card {
            background:white; padding:20px; border-radius:15px;
            box-shadow:0 6px 16px rgba(0,0,0,0.1); text-align:center;
        }
        .card img {
            width:100%; border-radius:12px;
        }
    </style>
</head>
<body>

<div class="navbar">
        <h2>Cake Shop</h2>
        <div>
            <a href="#">Home</a>
            <a href="#">My Orders</a>
            <a href="#">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

<h2 class="section-title">Search Results for "<?= htmlspecialchars($search) ?>"</h2>

<div class="cards">

<?php
// If no cakes found
if (mysqli_num_rows($result) == 0) {
    echo "<p style='text-align:center; width:100%; font-size:20px; color:#6c4ccf;'>
            ❌ No cakes found for '<b>" . htmlspecialchars($search) . "</b>'
          </p>";
}

// Show result cakes
while ($row = mysqli_fetch_assoc($result)) { ?>
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
<a href="customer_home.php">
<button class="back">Back</button></a>
</body>
</html>