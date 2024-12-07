<?php 

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

$mysqli = include "dbconnect.php"; #includes database connection
#$mysqli = require __DIR__ . "/dbconnect.php";

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
        header("Location: employeeintranet.php");
        exit;
    }
}
catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) { #iff there is a duplication error 9already exists)
        echo "Sorry this username was already taken";
    } else {
        throw $e;// in case it's any other error
    }

}

?>