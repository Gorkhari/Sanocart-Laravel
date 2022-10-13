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
if (isset($_GET['id'])) {
  $colname_theProduct = $_GET['id'];
}
mysqli_select_db($con, 'temp');
$query_theProduct = sprintf("SELECT * FROM product WHERE product_id = %s", GetSQLValueString($colname_theProduct, "int"));
$theProduct = mysqli_query($con, $query_theProduct);
$row_theProduct = mysqli_fetch_assoc($theProduct);
$totalRows_theProduct = mysqli_num_rows($theProduct);
?>