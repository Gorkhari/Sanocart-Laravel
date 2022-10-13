<?php
mysqli_select_db($con, 'temp');
$query_Products = "SELECT * FROM add_to_cart WHERE username = '{$_SESSION['username']}'";
$Products = mysqli_query($con, $query_Products) or die("Unable to connect to $con");
$row_Products = mysqli_fetch_assoc($Products);
$totalRows_Products = mysqli_num_rows($Products);
?>