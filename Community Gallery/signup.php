<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signinstyle.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--can be downloaded or included via script-->
    <script src="processhandler.js"></script>
    <title>Signup</title>
</head>
<body>
    <div id="backgrounddiv2"></div>
    <h1>Signup</h1>
    <div id="centerstuff">
        <!--below is the form for the signup-->
        <form name="signupform" id="signupform" action="#" method="post" onsubmit="return signupvalidation();">
            <label for="username">Name:</label>
            <input id="username" type="text" name="username" value = "">
            <br>
            <div class="error" id="nameerror"></div>

            <label for="password">Password:</label>
            <input id="password" type="text" name="password" value = "">
            <br>
            <div class="error" id="passworderror"></div>
            <label for="password_confirmation">Password Confirmation:</label>
            <input id="password_confirmation" type="text" name="password_confirmation" value = "">
            <br>
            <div class="error" id="passworderror2"></div>

            <input type="submit" name="Submit" value="Signup" class="signupbutton">
        </form>
        <p id="extraerrormessage"></p>
    </div>
</body>
</html>