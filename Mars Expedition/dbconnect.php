<?php 

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "mars expedition";

#$connection = mysqli_connect($server_name,$user_name,$password,$database_name);
return new mysqli($server_name,$user_name,$password,$database_name);

if(!$connection) {
    echo "Connection Failed!";
}
else {
    echo "Connected!";
}
?>