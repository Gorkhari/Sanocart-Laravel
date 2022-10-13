<?php
mysqli_select_db($con, 'temp');
$query_Products = "SELECT * FROM admin_login WHERE username = '{$_SESSION['username']}'";
$Products = mysqli_query($con, $query_Products) or die("Unable to connect to $con");
$row_Products = mysqli_fetch_assoc($Products) or die(header('Location: index.php'));
$totalRows_Products = mysqli_num_rows($Products) or die("Cart is vety Empty");
?>
