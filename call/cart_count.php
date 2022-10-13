<?php
mysqli_select_db($con, 'temp');
$sql = "SELECT COUNT(*) as count FROM add_to_cart Where username = '{$_SESSION['username']}'";
$Products = mysqli_query($con, $sql) or die("Unable to connect to $con");
$row_Products = mysqli_fetch_assoc($Products) or die("Cart is Empty");
$totalRows_Products = mysqli_num_rows($Products) or die("Cart is vety Empty");
?>
