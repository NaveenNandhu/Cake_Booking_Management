<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    echo "You must login first!";
    exit;
}

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // Check if order belongs to this user AND status is Pending
    $sql = "SELECT * FROM orders WHERE order_id='$order_id' AND user_id='{$_SESSION['user_id']}'";
    $res = mysqli_query($connection, $sql);
    $order = mysqli_fetch_assoc($res);

    if (!$order) {
        echo "Invalid Order!";
        exit;
    }

    if ($order['status'] !== 'Pending') {
        echo "<script>alert('You cannot cancel this order now!'); window.location='my_orders.php';</script>";
        exit;
    }

    // Cancel order
    $update = "UPDATE orders SET status='Cancelled' WHERE order_id='$order_id'";
    mysqli_query($connection, $update);

    echo "<script>alert('Order cancelled successfully!'); window.location='my_orders.php';</script>";
    exit;
}
?>