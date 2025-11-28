<?php
include "db.php";

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $update = "UPDATE orders SET status='Confirmed' WHERE order_id='$order_id'";
    mysqli_query($connection, $update);

    echo "<script>
            alert('Order Confirmed Successfully!');
            window.location.href='view_customer_orders.php';
          </script>";
}
?>