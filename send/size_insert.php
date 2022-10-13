<?php
include ('../config.php');
$product_id = filter_input(INPUT_POST, 'product_id');
$size = filter_input(INPUT_POST, 'size');


$sql = "INSERT INTO size_variation (product_id, size)
values ('$product_id','$size')";
if (mysqli_query($con, $sql)) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>
