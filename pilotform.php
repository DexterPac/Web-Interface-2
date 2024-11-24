<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Form</title>
    <script src="validator.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form name="firstform" onsubmit="return ValidateForm();" action="pilotform.php" method="post">
        <fieldset>

            <legend>Pilot's Information</legend>

            <label for="username">Name:</label>
                <input id="username" type="text" name="username" value = "">
                <br>
                <div class="error" id="nameerror"></div>


            <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" value="2000-01-01" min="0000-00-00" max="9999-12-31">
            
                
            <fieldset>

                <legend>Contact</legend>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phonenumber" value="800-123-4567">

                <br>
                <label for="email">E-mail:</label>

                <input type="email" id="email" name="E-mail" pattern=".+@\">
                <div class="error" id="mailerror"></div>

            </fieldset>

            <fieldset>
                <legend>Experience</legend>
                <label for="experience">Years of Associated Piloting Experience:</label>
                <input id="experience" type="number" name="experience" value = "" min="0">
                <div class="error" id="experror"></div>


                <br>
                <label for="story">List Relevent Experience:</label>
                <br>
                <textarea id="story" name="story" rows="5"cols="33"> </textarea>
                <br>
                <div class="error" id="storyerror"></div>
            </fieldset>

        </fieldset>

        <input type="reset" name="reset" value="Clear Form">

        <input type="submit" name="Submit" value="Send Form">
    </form>

    <br>

    <form action="Firstsite.php">
        <input type="submit" value="Click to go to home screen">
    </form>


</body>
</html>