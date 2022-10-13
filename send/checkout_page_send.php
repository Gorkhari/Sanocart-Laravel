<?php
require ('../config.php');
require ('../session_start.php');
// $photo = filter_input(INPUT_POST, 'photo');
$cart_id = filter_input(INPUT_POST, 'cart_id');
// $single_price = filter_input(INPUT_POST, 'single_price');
$username = filter_input(INPUT_POST, 'username');
// $order_day = filter_input(INPUT_POST, 'order_day');
// $product_id = filter_input(INPUT_POST, 'product_id');
// $quantity = filter_input(INPUT_POST, 'quantity');
// $Productname = filter_input(INPUT_POST, 'Productname');
// $Price = filter_input(INPUT_POST, 'Price');
// $order_time = filter_input(INPUT_POST, 'order_time');
// $email = filter_input(INPUT_POST, 'email');
// $address = filter_input(INPUT_POST, 'address');
// $country = filter_input(INPUT_POST, 'country');
// $state = filter_input(INPUT_POST, 'state');
// $zip = filter_input(INPUT_POST, 'zip');
// $paymentMethod = filter_input(INPUT_POST, 'paymentMethod');

mysqli_select_db($con, 'temp');

$query_Products = "SELECT * FROM add_to_cart WHERE cart_id = '{$_SESSION['cart_id']}'";
$Products = mysqli_query($con, $query_Products) or die("Unable to connect to $con");
//$row_Products = mysqli_fetch_assoc($Products) or die("Cart is Empty");
$totalRows_Products = mysqli_num_rows($Products) or die("Cart is vety Empty");
while($row_Products = mysqli_fetch_assoc($Products)){
  $sql = "INSERT INTO product_order (username, product_id, quantity, productname, email, address, country, state, zip, paymentMethod, order_time, order_day, photo, Price, cart_id)
  values ('".$row_Products['username']."','".$row_Products['product_id']."','".$row_Products['quantity']."','".$row_Products['Productname']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."',
  '".$_POST['zip']."','".$_POST['paymentMethod']."','".$_POST['order_time']."','".$_POST['order_day']."','".$row_Products['photo']."','".$row_Products['Price']."','".$row_Products['cart_id']."')";
  $ok =  mysqli_query($con, $sql); 
}

$deletesql = "DELETE FROM add_to_cart WHERE cart_id = '$cart_id'";
if ($con->query($deletesql) === TRUE) {
  header('Location: order_confirmation.php');
} else {
  echo "Error deleting record: " . $con->error;
} 
mysqli_close($con);
 ?>
