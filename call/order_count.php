<?php
mysqli_select_db($con, 'temp');
$sql = "SELECT COUNT(*) as count FROM product_order";
$count = mysqli_query($con, $sql) or die("Unable to connect to $con");
$row_count = mysqli_fetch_assoc($count) or die("Cart is Empty");
$totalRows_Products = mysqli_num_rows($count) or die("Cart is vety Empty");
?>
