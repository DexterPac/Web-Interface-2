<?php 
$postType = $_POST['posttype'];

if ($postType == "signupvalidation") { //if dealing with the signup form
    #if signup qualifications are not met, exit the process early
    $cancel_early = false;
    if(empty($_POST["username"])) {
        #die("Username is required");
        $cancel_early = true;
    }

    if(strlen($_POST["password"]) < 8) {
        #die("Password must be at least 8 character");
        $cancel_early = true;
    }

    if($_POST["password_confirmation"] !== $_POST["password"]) {
        #die("Password must match");
        $cancel_early = true;
    }
    if($cancel_early) {
        exit;
    }

    $password_hash = password_hash($_POST["password_confirmation"], PASSWORD_DEFAULT); #converts password to a hash

    $mysqli = include "dbconnection.php"; #includes database connection

    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";

    $stmt = $mysqli->stmt_init();
    if(! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error); #if there is an error preparing
    }

    $stmt->bind_param("ss", $_POST["username"], $password_hash); #add to database
    
    try {
        if($stmt->execute()) {
            #echo "Signup successful";
            $_SESSION["isloggedin"] = true;
            //header("Location: Directory.php"); //move header to processhandler
            echo "success";
            exit;
        }
    }
    catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { #if there is a duplication error 9already exists)
            //echo "Sorry this username was already taken";
            echo "error";
        } else {
            throw $e;// in case it's any other error
        }

    }
             
}
////////////////////////////////////////////////////////////////////////
else if($postType == "loginvalidation") { //if dealing with the login form

    $mysqli = include "dbconnection.php"; #include dataabase connection
    $sql = sprintf("SELECT * FROM user WHERE username = '%s'", $mysqli->real_escape_string($_POST["username"])); 
    //where we want the value to go/string placeholder, string value
    //btw "*" stands for 'any', in this case it is used for 'any row'
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
            //header("Location: Directory.php");
            echo "success";
            exit;
        }

    }

    $is_invalid = true;
}

?>