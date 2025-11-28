<?php
include 'db.php';

$cake_id = $_POST['cake_id'];
$review = $_POST['review'];
$rating = $_POST['rating'];

$sql = "INSERT INTO reviews (cake_id, review, rating) 
        VALUES ('$cake_id', '$review', '$rating')";

if (mysqli_query($connection, $sql)) {
    echo "Review submitted!";
} else {
    echo "Error!";
}
?>