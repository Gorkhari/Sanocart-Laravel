<?php
mysqli_select_db($con, 'temp');
$query_users = "SELECT * FROM account WHERE username = '{$_SESSION['username']}'";
$users = mysqli_query($con, $query_users) or die("");
$row_users = mysqli_fetch_assoc($users) or die(header('Location: index.php'));
$totalRows_users = mysqli_num_rows($users) or die("Cart is vety Empty");
?>
