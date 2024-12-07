<?php 
session_start();
session_destroy();
header("Location: MarsExpedition.php");
exit;
#resume session, remove user from session, them move to main screen
?>