<?php
require $_SERVER['DOCUMENT_ROOT'].'/kapada/call/product-details-call.php';

mysqli_select_db($con, 'temp');
$query_Size = "SELECT * FROM size_variation WHERE product_id = '{$row_theProduct['product_id']}'";
$Size = mysqli_query($con, $query_Size);
$row_Size = mysqli_fetch_assoc($Size);
$totalRows_Size = mysqli_num_rows($Size);
?>
