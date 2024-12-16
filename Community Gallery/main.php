<?php 

session_start();
#print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="generalstyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--can be downloaded or included via script-->
    <title>Menu</title>
</head>
<body>
    <!--this is the main stuff-->
    <div id="backgrounddiv"></div>
    <h1>Community Boards</h1>
    <div class="centerstuff"> 
        <p>Welcome to Community Boards! Below you can find buttons that will redirect you to the community gallery or your very own!</p>
        <p>These galleries are comprised of a variety of other users' submitted images!</p>
        <!--links to pages-->
        <form action="Directory.php">
            <input type="submit" value="User Directory">
        </form>
    </div>

<!--below features all the stuff for the interactable cube-->
    <div id="container">
        <div class="cube-container">
            <div class="cube">
                <div class="cube-face front">Creativity Unleased</div>
                <div class="cube-face back">Creativity Unleased</div>
                <div class="cube-face left">Creativity Unleased</div>
                <div class="cube-face right">Creativity Unleased</div>
                <div class="cube-face top">Creativity Unleased</div>
                <div class="cube-face bottom">Creativity Unleased</div>
            </div>
        </div>
    </div>

</body>
</html>
<!--below contains all the styling needed for the cube-->
<style>
    :root {
        --cube-width: 200px;
        --translateZ: 100px;
    }
    #container {
        position: relative;
        margin-top: 70px;
        max-width: 800px;
        left: 44%;
    }
    .cube-container {
        perspective: 1000px;
    }
    .cube-container .cube {
        width: var(--cube-width);
        height: var(--cube-width);
        transform-style: preserve-3d;
        
    }
    .cube-container .cube-face {
        width: var(--cube-width);
        height: var(--cube-width);
        font-size: 20px;
        background-color: rgb(111, 90, 77);
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgb(199, 199, 199);
        text-align: center;
        position: absolute;
    }
    .cube-container .front {
        background-color: rgb(144, 117, 101);
        transform: translateZ(var(--translateZ));
    }
    .cube-container .back {
        background-color: rgb(68, 55, 47);
        transform: rotateY(180deg) translateZ(var(--translateZ));
    }
    .cube-container .left {
        background-color: rgb(70, 63, 59);
        transform: rotateY(-90deg) translateZ(var(--translateZ));
    }
    .cube-container .right {
        background-color: rgb(144, 104, 81);
        transform: rotateY(90deg) translateZ(var(--translateZ));
    }
    .cube-container .top {
        background-color: rgb(111, 90, 77);
        transform: rotateX(90deg) translateZ(var(--translateZ));
    }
    .cube-container .bottom {
        background-color: rgb(111, 90, 77);
        transform: rotateX(-90deg) translateZ(var(--translateZ));
    }
</style>
<!--below contains all the jquery  needed for the cube-->
<script>
    $(document).ready(function() {
        let xAngle = 0;
        let yAngle = 0;
        const cube = $(".cube");

        //holding moues down while over cube element
        $(cube).on("mousedown", function(e) {
        //mouse moving
        $(document).on("mousemove", function(e) {
            xAngle = -(event.clientY/window.innerHeight - 0.5) * 270; //x axis angle
            yAngle = (event.clientX/window.innerHeight - 0.5) * 270; //y axis angle
            $(cube).css("transform", `rotateX(${xAngle}deg) rotateY(${yAngle}deg)`);
        });
            $(document).on("mouseup", function() {
                $(document).off("mousemove"); //stop moving cube when let go of mouse
            });
        });
    });
</script>


