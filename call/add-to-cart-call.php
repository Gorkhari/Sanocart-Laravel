
<?php
include ('../config.php');
?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
  {


    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

$colname_theProduct = "-1";
if (isset($_POST['product_id'])) {
  $colname_theProduct = $_POST['product_id'];
}
mysqli_select_db($con, 'temp');
$query_theProduct = sprintf("SELECT * FROM product WHERE product_id = %s", GetSQLValueString($colname_theProduct, "int"));
$theProduct = mysqli_query($con, $query_theProduct) or die(mysqli_error($con));
$row_theProduct = mysqli_fetch_assoc($theProduct);
$totalRows_theProduct = mysqli_num_rows($theProduct);

mysqli_select_db($con, 'temp');
$query_orders = "SELECT p.product_id, p.photo, p.Price, p.Productname, o.order_id, o.username, o.product_id, o.quantity, o.order_time, o.Price, a.user_id, a.username
FROM product as p, product_order as o, account as a WHERE o.product_id = p.product_id and o.username = a.username
ORDER BY order_time ASC";
$orders = mysqli_query($con, $query_orders) or die(mysqli_error($con));

$row_orders = mysqli_fetch_assoc($orders);
$totalRows_orders = mysqli_num_rows($orders);

$colname_theUser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_theUser = $_SESSION['MM_Username'];
}
mysqli_select_db($con, 'temp');
$query_theUser = sprintf("SELECT * FROM account WHERE username = %s", GetSQLValueString($colname_theUser, "text"));
$theUser = mysqli_query($con, $query_theUser) or die(mysqli_error($con));
$row_theUser = mysqli_fetch_assoc($theUser);
$totalRows_theUser = mysqli_num_rows($theUser);
?>