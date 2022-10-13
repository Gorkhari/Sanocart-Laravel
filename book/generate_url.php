<?php
include('session_start.php');
$id = session_id();

mysqli_select_db($con, 'temp');
$query_book = sprintf("SELECT * FROM booking WHERE id = '$id'");
$book = mysqli_query($con, $query_book);
$row_book = mysqli_fetch_assoc($book);
$totalRows_book = mysqli_num_rows($book);
?>
