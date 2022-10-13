<?php
include ('../config.php');
include ('../session_start.php');
include ('../call/cart_page_call.php');

$username = filter_input(INPUT_POST, 'username');
$product_id = filter_input(INPUT_POST, 'product_id');
$quantity = filter_input(INPUT_POST, 'quantity');
$Productname = filter_input(INPUT_POST, 'Productname');
$Price = filter_input(INPUT_POST, 'Price');
$photo = filter_input(INPUT_POST, 'photo');
$Size = filter_input(INPUT_POST, 'Size');
$cart_id = $row_Products['cart_id'];
$_SESSION['cart_id'] = $cart_id;

mysqli_select_db($con, 'temp');
$check_query = "SELECT * FROM add_to_cart WHERE product_id = '{$product_id}' AND cart_id = '{$_SESSION['cart_id']}' ";
$check =  mysqli_query($con, $check_query) or die("Unable to connect to $con");
if (mysqli_num_rows($check) == 0) {
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
}
else 
{
   
mysqli_select_db($con, 'temp');
$query_GETquantity = "SELECT quantity FROM add_to_cart WHERE product_id = '{$product_id}' AND cart_id = '{$_SESSION['cart_id']}'";
$GETquantity = mysqli_query($con, $query_GETquantity) or die("");
$row_GETquantity = mysqli_fetch_assoc($GETquantity) or die(header('Location: index.php'));
$totalRows_GETquantity = mysqli_num_rows($GETquantity) or die("no data");

$y = $row_GETquantity['quantity'];
$new_q = $quantity + $y;

	$sql = ("UPDATE add_to_cart SET quantity ='$new_q' WHERE product_id = '$product_id' AND cart_id = '{$_SESSION['cart_id']}'");
}
if (mysqli_query($con, $sql)) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
?>
