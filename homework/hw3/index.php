<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>

    <head>
        <title> Almost Craps! </title>
        <meta charset="utf-8"/>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    
    <body>
        <div id="top">
            <h1> Dice Pool Roller </h1>
        </div>
        
        <div id="images">
            <images>
                <?php
                    $pool = roll();
                ?>
            </images>
        </div>
    </body>

<hr>

    <footer>
        5+ is a success in dice pool rolling, 3 or more success is a critical roll!
    </footer>

</html>