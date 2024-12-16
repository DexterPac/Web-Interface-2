<?php 
session_start();
session_destroy();
header("Location: main.php");
exit;
#resume session, remove user from session, them move to main screen
?>