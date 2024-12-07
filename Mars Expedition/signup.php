<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <script src="validation.js"></script>
</head>
<body>
    <h1>Signup</h1>
    <br>
    <form name="signupform" action="log_sign_process.php" method="post" onsubmit="return signupvalidation();">
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
</body>
</html>