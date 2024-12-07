<?php 
    if($_SERVER["REQUEST_METHOD"]  === "POST") { #upon post request
        $mysqli = include "dbconnect.php"; #include dataabase connection
        $sql = sprintf("SELECT * FROM user WHERE username = '%s'", $mysqli->real_escape_string($_POST["username"])); 
        //wherer we want the value to go/string placeholder, string value
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        //var_dump($user);
        //exit;
        if($user) {
            if(password_verify($_POST["password"], $user["password"])) { #if password matches that in databasse
                #die("Login Successful");
                session_start(); #as name implies
                $_SESSION["user_id"] = $user["id"]; #session user id = databse id
                $_SESSION["username"] = $user["username"]; #same
                $_SESSION["isloggedin"] = true; #user is logged in
                header("Location: employeeintranet.php");
                exit;
            }

        }

        $is_invalid = true;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
    <script src="validation.js"></script>
</head>
<body>
    <h1>Login</h1>
    <br>
    <form name="loginform" method="post" onsubmit="return loginvalidation();">
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
</body>
</html>