<?php
$name = filter_input(INPUT_POST, 'name');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');
$book_id = filter_input(INPUT_POST, 'book_id');
include ('../config.php');
include ('session_start.php');

	
$sql =sprintf(
    "UPDATE booking SET name = '$name', date='$date', time= '$time' WHERE book_id = '$book_id'"
);
	if (mysqli_query($con, $sql)) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>