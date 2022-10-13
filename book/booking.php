<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');


include ('../config.php');
include ('session_start.php');
$id = session_id();
$approve = "Nil";
	
$sql = "INSERT INTO booking (name, date, time, email, id, approve)
values ('$name', '$date', '$time', '$email', '$id', '$approve')";
	if (mysqli_query($con, $sql)) {
	include('generate_url.php');
	$email_book_id = $row_book['book_id'];
// 	
	
	include('thank_you_mail.php');
 
  header("Location: thank_you.php");

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>
