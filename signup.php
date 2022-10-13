<?php
$FullName = filter_input(INPUT_POST, 'fullname');
$Email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
include('config.php');

$sql = "INSERT INTO account (username, password, fullname, email)
values ('$username','$password','$FullName','$Email')";
if (mysqli_query($con, $sql)) {
	$message = "Login Succesful";

} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

?>
<html>

<head></head>

<body>
    Thank you for joining!
    <br>
    <a href="index.php">Go to Login Page</a>
</body>

</html>