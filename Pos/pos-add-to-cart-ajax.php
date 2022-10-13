<?php
include '../config.php'; // being the MySQLi_ API
if (!empty($_GET['q'])) {
  $q = mysqli_real_escape_string($con, $_GET['q']);
  $query = mysqli_query($con, "SELECT * FROM product WHERE `SKU` = '%'") or die(mysqli_error($con));
  $results = mysqli_fetch_array($query);
  if (mysqli_num_rows($query) > 0) {
    $insertsql = "INSERT INTO add_to_cart (product_id, Productname, Price)
     values()";
  }
}
