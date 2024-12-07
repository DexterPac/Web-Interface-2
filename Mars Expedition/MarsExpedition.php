<?php 

session_start();
#print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarsExpedition</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Claugomatrai Mars Expedition Signup</h1>
    <div id ="para1"  class="paradivs">
        <p>Claugomatrai is an aeronautics and space exploration company founded on the principles of freedom of exploration and discovery.</p>
        <p>Claugomatrai has been in service since 2013 and has provided numerous successelful launches into space and other astronomical findings.</p>
        <p>Claugomatrai is now preparing to send the first human expedition to Mars and is calling upon critera matching volunteers for this expedition.</p>
    </div>
    <br>

    <div id="para2" class="paradivs">
        <p>To participate in Claugomatrai's Mars Expedition Program, please fill out the following form.</p>
        <p>Please note that this form is not the final selection process, but rather the first step in a thorough selection filter.</p>
    </div>
    <div id="para3" class="paradivs">
        <p>Claugomatrai is also offering tours to a series of planets throughout our solar system! To view tour dates
            and to sign up for one, click the link below!</p>
    </div>
    
    <br>

    <!--links to various pages -->
    <form action="employeeintranet.php"">
        <input type="submit" value="Click to go to employee intranet">
    </form>
    <form action="intranet.php">
        <input type="submit" value="Click to go to intranet">
    </form>
    <form action="signup.php">
        <input type="submit" value="Click to go to signup">
    </form>
    <form action="login.php">
        <input type="submit" value="Click to go to login">
    </form>
    <form action="logout.php">
        <input type="submit" value="Click to go to logout">
    </form>


   

    <!--A "static" homepage is designed using html, css, and javascript.
    For this assignment, we are making a static homepage, but with a php extension so has to be run using a
    hosted server.-->
    

</body>
</html>