<?php 

session_start();
#print_r($_SESSION);
#if user has already logged in
if(!isset($_SESSION["isloggedin"])){ //if variable has not been set
    header("Location: loginplease.html");
    exit;
}
else if(!$_SESSION["isloggedin"]) { //if variable is false
    header("Location: loginplease.html");
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
    <link rel="stylesheet" href="generalstyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--can be downloaded or included via script-->
    <title>Directory</title>
</head>
<body>
    <div id="backgrounddiv"></div>
    <h1>Directory</h1>
    <div class="centerstuff">
        <div id="ehehhaw"> <!--I didn't know what to name this-->
            <form action="logout.php">
                <input class="forminput2" type="submit" value="Click to go to logout">
            </form>
            <form action="main.php">
                <input class="forminput2" type="submit" value="Click to go to home page">
            </form>
        </div>
    </div>
</body>
</html>

<!--
<script>
    $(document).ready(function() {

    });
</script>
    -->