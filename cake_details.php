<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo "Invalid Cake!";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM cakes WHERE cake_id='$id'";
$result = mysqli_query($connection, $query);
$cake = mysqli_fetch_assoc($result);

if (!$cake) {
    echo "Cake not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $cake['name']; ?> Details</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        body { font-family: Arial; padding:40px; background:#f3f3f3; margin:0%; }
        .container { width:60%; margin:auto; background:white; padding:20px; border-radius:12px; }
        img { width:100%; border-radius:12px; }
        select, input { padding:10px; width:200px; margin-top:10px; }
        button { padding:12px; background:#6c4ccf; color:white; border:none; border-radius:8px; margin-top:20px; cursor:pointer; }
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

    <img src="<?= $cake['image']; ?>" alt="Cake">

    <h1><?= $cake['flavour']; ?></h1>
    <p><?= $cake['description']; ?></p>

    <h3>Base Price: ₹<span id="base_price"><?= $cake['price']; ?></span></h3>

    <label>Select Weight (KG)</label>
    <input type="number" id="weight" value="1" min="1" oninput="updatePrice()" />
        
    </select>
    <label>Quantity</label>
    <input type="number" id="qty" value="1" min="1" oninput="updatePrice()" />

    <h2>Total Price: ₹<span id="total_price"><?= $cake['price']; ?></span></h2>

    <label>Message on Cake</label>
        <input type="text" id="message" placeholder="Happy Birthday..."><br><br>

    <label>Payment Method</label><br>
    <select>
        <option>Online</option>
        <option>Offline</option>
    </select>

    <form action="order_summary.php" method="POST">
    <input type="hidden" name="cake_id" value="<?= $cake['cake_id']; ?>">
    <input type="hidden" name="flavour" value="<?= $cake['flavour']; ?>">
    <input type="hidden" name="price" id="hidden_price" value="<?= $cake['price']; ?>">

    <input type="hidden" name="kg" id="hidden_kg">
    <input type="hidden" name="quantity" id="hidden_qty">
    <input type="hidden" name="message" id="hidden_message">

    <button type="submit" style="padding:12px 20px;background:#6c4ccf;color:white;border:none;border-radius:8px;">
        Place Order
    </button>
</form>
    <hr><br>
    <a href="show_review.php? id=<?=$cake['cake_id']; ?>"style="display:inline-block; background:#6c4ccf; color:white; padding:8px 15px; border-radius:6px; text-decoration:none;">
        Review</a>


    <h3>Write a Review</h3>
    
    <form method="POST" action="save_review.php">
        <input type="hidden" name="cake_id" value="<?= $cake['cake_id']; ?>">

        <textarea name="review" placeholder="Write your review..." style="width:100%; height:100px;"></textarea><br><br>

        <label>Rating:</label>
        <select name="rating">
            <option value="1">⭐</option>
            <option value="2">⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="5">⭐⭐⭐⭐⭐</option>
        </select>

        <button type="submit">Submit Review</button>
    </form>
</div>
<a href="customer_home.php">
<button class="back">Back</button></a>

<script>
function updatePrice() {
    let base = parseInt(document.getElementById("base_price").innerText);
    let weight = parseInt(document.getElementById("weight").value);
    let qty = parseInt(document.getElementById("qty").value);

    let total = base * weight * qty;

    document.getElementById("total_price").innerText = total;
}<
document.querySelector("form").addEventListener("submit", function() {
    document.getElementById("hidden_message").value = document.getElementById("message").value;
});
</script>
</body>
</html>