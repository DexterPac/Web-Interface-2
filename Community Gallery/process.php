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
////////////////////////////////////////////////////////////////////////
else if($postType == "uploadImage") { #upload image to the database
    $mysqli = include "dbconnection.php"; #include dataabase connection
    $sql = "INSERT INTO galleries (user_gallery, id) VALUES (?, ?)";

    $stmt = $mysqli->stmt_init();
    if(! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error); #if there is an error preparing
    }
    session_start();
    $stmt->bind_param("ss", $_POST["gallery"], $_SESSION['user_id']); #add to database
    try {
        if($stmt->execute())
        {
            echo "success";
            exit;
        }
    }
    catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { #if there is a duplication error already exists)
            try {
                $sql2 = sprintf("SELECT * FROM galleries WHERE id = '%s'", $mysqli->real_escape_string($_SESSION["user_id"])); 
                $result = $mysqli->query($sql2);
                $user = $result->fetch_assoc(); 
                //echo $user["user_gallery"];
                $arr = json_decode($user["user_gallery"], true); //converting json to php formatted array
                $arr3 = array();
                foreach($arr as $key => $value) { #go through each already existing entry in your gallery
                    $arr3[$key] = $value;
                }
                foreach(json_decode($_POST["gallery"]) as $key => $value) #just get the key name and value of post just to add it to php array
                {
                    $arr3[$key] = $value;
                }
                $pointer = json_encode($arr3); #making this because bind_param needs a reference pointer/variable
                //and cannot use a function result

                $query = "UPDATE galleries SET user_gallery = ? WHERE id = ?";
                if(! $stmt->prepare($query)) {
                    die("SQL error: " . $mysqli->error); #if there is an error preparing
                }
                //echo($_POST["gallery"]);
                $stmt->bind_param("si", $pointer, $_SESSION['user_id']); #first are 
                #the"s"s which are your new values, while the "i" is you condition variable (WHERE)
                if($stmt->execute()) {
                    echo "success";
                    exit;
                }
            }
            catch (mysqli_sql_exception $e) {
                echo "error";
                exit;
            }
        } else {
            throw $e;// in case it's any other error
        }
    }
}
else if($postType == "getuploadImage") { #get theimage data from database -> this idea is being shelved for technical limitations and time constraints
    $mysqli = include "dbconnection.php"; #include dataabase connection
    session_start();
    $sql = sprintf("SELECT * FROM galleries WHERE id = '%s'", $mysqli->real_escape_string($_SESSION["user_id"])); 
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc(); #fetch user

    $arr = json_decode($user["user_gallery"], true); //converting json to php formatted array
    $arr2 = array_values($arr);
    $arr3 = array();
    
    for ($x = 0; $x <= count($arr2)-1; $x++) { //this is a more automated may of reassigning the data into a php array (unlike the example below)
        $arr3["imgsrc" . "$x"] = $arr2[$x];
       //$arr3 = $x;
    };
    echo(json_encode($arr3));

    /*
    echo($arr["img1"]);
    $arr2 = array(
        "imgsrc" => $arr["img1"],
    );
    
    //echo json_encode($arr2);
    */
    exit;
}
/*
else if($postType == "getgalleries") 
{
    $mysqli = include "dbconnection.php";

    $sql = sprintf("SELECT user_gallery FROM galleries ORDER BY id"); #select all galleries
    $result = $mysqli->query($sql);
    $users = $result->fetch_all(); #selects all resulting rows
    //$arr = json_decode($users["user_gallery"], true); 
    //print_r(count($arr));

    #$arr = json_decode($users["user_gallery"], true); //converting json to php formatted array
    //I need to figure out how to loop through each index of this new users array (than I can sort through them like normal)
    //I will need to process them into an arrays of values, then arrays of those values

    $arr2 = array_values($users);
    
    $arr3 = array();
    $arr4 = array();
    print_r($arr2[0]);
    
    #for ($x = 0; $x <= count($arr2)-1; $x++) {
        #$arr3["$x"] = $arr2[$x]; #arr3 will be an array consisting of a gallery from each user
       #//$arr3 = $x;
       #//print_r($arr3["$x"]);
    #};
    
    //print_r($arr3);
    
    #for ($x = 0; $x <= count($arr3)-1; $x++) {
        #$arr4["$x"] = $arr3[$x]; #doing it this way wouldn't work, because we would just have a massive list of each
        #//image by itself, rather than grouped by user
       #//$arr3 = $x;
    #};
    #$arr = json_decode($arr3["user_gallery"], true); //converting json to php formatted array
    //i would to need to redo this proccess but for each gallery entry then some send all of it



 //this does not work i may need to do a bit mor testing to figure out out he php array structure of all this works/lays out
     for ($x = 0; $x <= count($arr3)-1; $x++) {
        //$tempvar = json_decode($arr3[$x]);
        //$arr4["$x"] = json_decode($tempvar[["user_gallery"]]); //this does not work
        $tempvar = $arr3[$x];
        $arr4["$x"] = $tempvar["user_gallery"];
       //$arr3 = $x;
       print_r($arr4["$x"]);
    };
    

    
    //echo(json_encode($arr3));
    
    //print_r($arr2);
    //print_r($arr2[0]);
    //exit; 



}
*/

?>