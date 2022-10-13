<?php
$BI = $_GET['book_id'];
$EM = $_GET['email'];

mysqli_select_db($con, 'temp');
$query_book = sprintf("SELECT * FROM booking WHERE book_id = '$BI' AND email = '$EM' ");
$book = mysqli_query($con, $query_book);
$row_book = mysqli_fetch_assoc($book);
$totalRows_book = mysqli_num_rows($book);
?>
