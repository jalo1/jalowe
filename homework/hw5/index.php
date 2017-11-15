<?php
include 'inc/functions.php';

if(isset($_GET['layout'])) {
    $dice = $_GET['layout'];
}
else {
    $dice = "d6";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <title> Almost Craps! </title>
        <meta charset="utf-8"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>
        <div id="top">
            <h1> Dice Pool Roller </h1>
        </div>
        
        <div id="images">
            <images id="PC">
                <?=$pool = roll($dice)?>
            </images>
            
            <div id="button">
                <button onclick="reveal()">DM ROLL</button>
            </div>
            
            <images id="DM">
                <?=$pool = roll($dice)?>
            </images>
            
            
            
            <script>
                $("#DM").hide();

                function reveal() {
                    document.getElementById("button").innerHTML = "DM rolls behind the screen!";
                    document.getElementById("button").style.fontSize = "xx-large";
                    document.getElementById("button").style.color = "red";

                    $("#DM").show();
                }

            </script>
            
        </div>
    </body>

<hr>

<form>
    
<form action="index.php" method="get">
    
<input type="radio" id="ld6" name="layout" value="d6">
<label for="ld6"> d6 </label>

<input type="radio" id="ld8" name="layout" value="d8" <?= ($_GET['layout']=='d8')?"checked":""  ?> >
<label for="ld8"> d8 </label>

<button onclick="myFunction()">Roll!</button>
</form>


    <footer>
        5+ is a success in dice pool rolling, 3 or more success is a critical roll!
        <img src="img/buddy_verified.png">
    </footer>
    

</html>