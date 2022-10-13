<?php
mysqli_select_db($con, 'temp');
$query_category = "SELECT * FROM categories";
$category = mysqli_query($con, $query_category) or die("");
$row_category = mysqli_fetch_assoc($category) or die(header('Location: index.php'));
$totalRows_category = mysqli_num_rows($category) or die("no data");
?>
