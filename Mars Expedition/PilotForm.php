<?php 

session_start();
#print_r($_SESSION);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Form</title>
    <link href='https://fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="validation.js"></script>
</head>
<body>
    <div id="logosquare">Claugomatrai</div>
    <div id="topbar"></div>
    <div id="leftcolumn"></div>
    
<!--below is all the form stuff-->
    <div id="centerboxstuff">
        <form name="firstform" onsubmit="return ValidateForm();" action="PilotForm.php" method="post">
            <div id="personalsection" class="informationbox">
                <label for="username">Name:</label>
                <input id="username" type="text" name="username" value = "">
                <br>
                <div class="error" id="nameerror"></div>

                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" value="2000-01-01" min="0000-00-00" max="9999-12-31">
                <br>
                <div class="error" id="dateerror"></div>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phonenumber" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <br>
                <div class="error" id="phoneerror"></div>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="E-mail" pattern="[^@\s]+@[^@\s]+\.[^@\s]+">
                <br>
                <div class="error" id="mailerror"></div>

                <label for="weight">Weight(lbs):</label>
                <input id="weight" type="number" name="weight" min="0">
                <br>
                <div class="error" id="weighterror"></div>
            </div>
            <!--the above is all personal information-->
            <!--all below is experience related form inputs-->
            <div id="experiencesection" class="informationbox">
                Do you have any experience as a pilot or other related experiences?
                <br>
                <label for="expyes">Yes</label>
                <input type="radio" id="expyes" name="expcon" value="Yes">
                <label for="expno">No</label>
                <input type="radio" id="expno" name="expcon" value="No" checked>
                <br>
                <div class="error" id="experror"></div>
                <br>
                <label for="story">Please list any related experience you may have/had in the box below.</label>
                <br>
                <textarea id="story" name="story" rows="5"cols="33"> </textarea>
                <br>
                <div class="error" id="storyerror"></div>
            </div>

            <!--below is the form buttons-->
            <input type="reset" name="reset" value="Clear Form" class="formbutton">
            <input type="submit" name="Submit" value="Send Form" class="formbutton">
            
            <br>
            <br>
            <br>
            <div id="timer">Time until next launch:</div>
            <!--timer-->

        </form>
    </div>


    <div id="rightcolumn"></div>
    <footer id="footerstuff"></footer>
</body>
</html>