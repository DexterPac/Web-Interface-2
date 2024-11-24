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
    
    <form id="firstform" name="firstform" onsubmit="return ValidateForm();" action="pilotform.php" method="post">

           

            <div>
                <label for="username">Name:</label>
                    <input id="username" type="text" name="username" value = "">
                    <br>
                    <div class="error" id="nameerror"></div>
            </div>

            <div>
                <label for="age">Age:</label>
                    <input id="age" type="text" name="age" value="">
                    <br>
                    <div class="error" id="ageerror"></div>
            </div>

            
                
            

                <legend>Contact</legend>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phonenumber" value="800-123-4567">


           
                <legend>Experience</legend>
                <label for="experience">Years of Associated Piloting Experience:</label>
                <input id="experience" type="text" name="experience" value = "">
                <div class="error" id="experror"></div>


                <br>
                <label for="story">List Relevent Experience:</label>
                <br>
                <textarea id="story" name="story" rows="5"cols="33"> </textarea>
                <div class="error" id="storyerror"></div>
            

        

        <input type="reset" name="reset" value="Clear Form">

        <input type="submit" name="Submit" value="Send Form">
    </form>


</body>
</html>