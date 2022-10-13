<?php
mysqli_select_db($con, 'temp');
$query_orders = "SELECT * FROM product_order WHERE cart_id = '{$_SESSION['cart_id']}' ORDER BY order_time DESC";
$orders = mysqli_query($con, $query_orders);
$row_orders = mysqli_fetch_assoc($orders);
$totalRows_orders = mysqli_num_rows($orders);
?>
