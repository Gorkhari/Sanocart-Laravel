<?php
$book_id = filter_input(INPUT_POST, 'book_id');
$approve = filter_input(INPUT_POST, 'approve');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

include ('../config.php');
include ('session_start.php');

$sql =sprintf(
    "UPDATE booking SET approve ='$approve' WHERE book_id = '$book_id'"
);
if (mysqli_query($con, $sql)) {
    include('mail_to.php');
	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
