<?php
include ('../config.php');
?><?php
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

  mysqli_select_db($con, 'temp');
  $query_allProducts = "SELECT * FROM product";
  $allProducts = mysqli_query($con, $query_allProducts) or die(mysqli_error($con));
  $row_allProducts = mysqli_fetch_assoc($allProducts) or die(mysqli_error($con));
  $totalRows_allProducts = mysqli_num_rows($allProducts) or die(mysqli_error($con));
  ?>