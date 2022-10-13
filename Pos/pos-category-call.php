<?php
mysqli_select_db($con, 'temp');
$query_category = "SELECT * FROM categories WHERE Active = 'Yes'";
$category = mysqli_query($con, $query_category) or die(mysqli_error($con));
$row_category = mysqli_fetch_assoc($category);
$totalRows_category = mysqli_num_rows($category);
?>
