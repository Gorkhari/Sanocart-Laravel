<?php
include('session_start.php');
$y = session_id();
 
mysqli_select_db($con, 'temp');
$query_book = sprintf("SELECT * FROM booking WHERE temp_book_id = '$y'");
$book = mysqli_query($con, $query_book);
$row_book = mysqli_fetch_assoc($book);
$totalRows_book = mysqli_num_rows($book);
?>
<p><?php echo $y ?></p>

<p><?php echo $row_book['email']; ?></p>