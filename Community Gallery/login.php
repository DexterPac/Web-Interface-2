<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signinstyle.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--can be downloaded or included via script-->
    <script src="processhandler.js"></script>
    <title>Login</title>
</head>
<body>
<div id="backgrounddiv2"></div>
    <h1>Login</h1>
    <div id="centerstuff"> <!--below is the form for the login-->
        <form name="loginform" id="loginform" method="post" onsubmit="return loginvalidation();">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value = "">
            <br>
            <div class="error" id="nameerror"></div>

            <label for="password">Password:</label>
            <input id="password" type="text" name="password" value = "">
            <br>
            <div class="error" id="passworderror"></div>

            <input type="submit" name="Submit" value="Login" class="loginbutton">
        </form>
        <p id="extraerrormessage"></p> 
    </div>
</body>
</html>