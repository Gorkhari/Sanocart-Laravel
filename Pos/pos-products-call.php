<?php
mysqli_select_db($con, 'temp');
$query_Products = "SELECT * FROM product WHERE Active = 'Yes'";
$Products = mysqli_query($con, $query_Products) or die(mysqli_error($con));
$row_Products = mysqli_fetch_assoc($Products);
$totalRows_Products = mysqli_num_rows($Products);
?>