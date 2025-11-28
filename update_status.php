<?php
include "db.php";

if (isset($_GET['id']) && isset($_GET['status'])) {
    $order_id = $_GET['id'];
    $status   = $_GET['status'];

    $update = "UPDATE orders SET status='$status' WHERE order_id='$order_id'";
    mysqli_query($connection, $update);

    echo "<script>
            alert('Order status changed to: $status');
            window.location.href='view_customer_orders.php';
          </script>";
}
?>