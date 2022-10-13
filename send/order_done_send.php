<?php
require ('../config.php');

// $photo = filter_input(INPUT_POST, 'photo');
$cart_id = filter_input(INPUT_POST, 'cart_id');
// $single_price = filter_input(INPUT_POST, 'single_price');
$username = filter_input(INPUT_POST, 'username');
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


$sql = "INSERT INTO order_done (order_id, username, product_id, quantity, productname, Price, email, address, country, state, zip, paymentMethod, order_time, photo, single_price, cart_id)
values ('".$_POST['username']."','".$_POST['product_id']."','".$_POST['quantity']."','".$_POST['Productname']."','".$_POST['Price']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."',
'".$_POST['zip']."','".$_POST['paymentMethod']."','".$_POST['order_time']."','".$_POST['photo']."','".$_POST['single_price']."','".$_POST['cart_id']."')";
$ok =  mysqli_query($con, $sql); 
$deletesql = "DELETE FROM product_order WHERE cart_id = '$cart_id'";

if ($con->query($deletesql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  echo "Error deleting record: " . $con->error;
} 
// } else {
// 	echo "Error: " . $deletesql . "<br>" . mysqli_error($con);
// }
// mysqli_close($con);
?>
