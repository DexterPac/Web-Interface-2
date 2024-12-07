<?php 

session_start();
#print_r($_SESSION);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if (isset($_SESSION["user_id"])): ?> <!--if there is an assigned user id-->
        <!--displayers user's name-->
        <p>Hello <?= htmlspecialchars($_SESSION["username"]) ?></p> 
        <br>
        <p>We apologize, but this page is currently under development</p>
        
        <!--<p><a href="logout.php">Log out</a></p>-->
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>

    
</body>
</html>