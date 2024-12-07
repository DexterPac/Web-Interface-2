<?php 

session_start();
#print_r($_SESSION);
#if user has already logged in
if(!isset($_SESSION["isloggedin"])){
    header("Location: login.php");
    exit;
}
else if(!$_SESSION["isloggedin"]) {
    header("Location: login.php");
    exit;
}
else {
    #print_r($_SESSION["isloggedin"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet</title>
    <link rel="stylesheet" href="intranetstyle.css">
</head>
<body>
    <!--intranet for login needed-->
    <h1>Employee Intranet</h1>
    <div id="mainform">
        <br>
        <form action="PilotForm.php">
            <input class="forminput2" type="submit" value="Click to go to pilot form">
        </form>
        <br>
        <form action="MarsTours.php">
            <input class="forminput2" type="submit" value="Click to go to tours form">
        </form>
        <br>
        <form action="MarsExpedition.php">
            <input class="forminput2" type="submit" value="Click to go to back to main menu">
        </form>
        <br>
        <form action="logout.php">
        <input class="forminput2" type="submit" value="Click to go to logout">
    </form>
    </div>
    



</body>
</html>