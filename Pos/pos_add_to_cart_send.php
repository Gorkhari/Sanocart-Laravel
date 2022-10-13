<?php
include('../config.php');
include('../session_start.php');
$username = filter_input(INPUT_POST, 'username');
$product_id = filter_input(INPUT_POST, 'product_id');
$quantity = filter_input(INPUT_POST, 'quantity');
$Productname = filter_input(INPUT_POST, 'Productname');
$Price = filter_input(INPUT_POST, 'Price');
$photo = filter_input(INPUT_POST, 'photo');
$Size = filter_input(INPUT_POST, 'Size');
$Brand = filter_input(INPUT_POST, 'Brand');
if(!(isset($_SESSION['cart_id']))){
	$cart_id = $username.rand(1, 30000);
	$_SESSION['cart_id'] = $cart_id;
	$sql = "INSERT INTO add_to_cart (cart_id, username, product_id, quantity, productname, Price, photo, Size)
	values ('$cart_id','$username','$product_id','$quantity','$Productname', '$Price', '$photo', '$Size')";
}
else
{
	$sql = "INSERT INTO add_to_cart (cart_id, username, product_id, quantity, productname, Price, photo, Size)
	values ('{$_SESSION['cart_id']}','$username','$product_id','$quantity','$Productname', '$Price', '$photo', '$Size')";
}
if (mysqli_query($con, $sql)) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>
