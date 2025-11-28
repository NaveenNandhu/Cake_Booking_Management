<?php
include "db.php";

// 1. GET ID FROM URL
if (!isset($_GET['id'])) {
    die("❌ ERROR: No cake ID passed in URL.<br>Open like: show_review.php?id=1");
}

$cake_id = $_GET['id'];
echo "Cake ID received: $cake_id <br>";

// 2. FETCH REVIEWS
$query = "SELECT * FROM reviews WHERE cake_id = '$cake_id'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("❌ SQL ERROR: " . mysqli_error($conn));
}

$rows = mysqli_num_rows($result);
echo "Reviews found: $rows <br><br>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reviews</title>
    <link rel="stylesheet" href="nav.css">
    <style>
        .review-box {
            background: #f0f0f0;
            margin-bottom: 10px;
            padding: 12px;
            border-radius: 6px;
        }
        .rating {
            font-size: 20px;
            color: orange;
        }
    </style>
</head>
<body>

<h2>Customer Reviews</h2>

<?php
if ($rows > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
        ?>
        <div class="review-box">
            <div class="rating">⭐ <?php echo $r['rating']; ?>/5</div>
            <p><?php echo $r['review']; ?></p>
        </div>
        <?php
    }
} else {
    echo "<p>No reviews available for this cake.</p>";
}
?>
</body>
</html>