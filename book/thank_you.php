<?php
include ('../config.php');
include ('session_start.php');
?>
<?php
session_start(); 
$_SESSION = []; 

// If it's desired to kill the session, also 
// delete the session cookie. 
// Note: This will destroy the session, and 
// not just the session data! 
if (ini_get("session.use_cookies")) { 
    $params = session_get_cookie_params(); 
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"] 
    ); 
} 

// Finally, destroy the session. 
session_destroy();
?>
<h1>Thank you for requesting to booking with us!!!</h1>
<p>Please Check you email.</p>



