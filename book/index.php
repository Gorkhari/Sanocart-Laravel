<?php 
include ('../config.php');
include ('session_start.php');

if (!isset($session_id)) {
    header('Location: calendar/index.php');
    exit;
}
?> 