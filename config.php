<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'smartind_Smarty';
$DATABASE_PASS = 'Desertstorm@123';
$DATABASE_NAME = 'smartind_temp';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die("Failed to connect with MySQL: ". mysqli_connect_error());  
}
?>
