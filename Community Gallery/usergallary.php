<?php 

session_start();
#print_r($_SESSION);
/*
$sql = sprintf("SELECT * FROM galleries WHERE id = ?", $_SESSION["user_id"]);
$result = $mysqli->query($sql);
$user = $result->fetch_assoc(); 

$_SESSION["thisusergallery"] = $user["user_gallery"];
*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="usergallarystyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--can be downloaded or included via script-->
    <script src="processhandler.js"></script>
    <title>Gallary</title>
</head>
<body>
    <div id="backgrounddiv"></div>
    <p id="extraerrormessage"></p>
    <div class="centerstuff">
    <div id="ehehhaw"> 
        <form id="imageform">
            <input type="file" name="chosenImage" id="image-picker" accept="image/*">
            <input type="submit" name="upload" value="Start Image Upload">
        </form>
        <form action="Directory.php">
                <input class="forminput2" type="submit" value="Click to go to your directory">
        </form>
    </div>
    </div>
    <br>
    <img id="imageDisplay" src="" class="images">
    <button class="btn" id="addimagebtn" onClick="addimage();"></button>
</body>
</html>