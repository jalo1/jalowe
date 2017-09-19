<?php
include 'inc/functions.php';


$dice = array(1,2,3,4,5,6);






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
            <h1> This is something almost like craps! </h1>
        </div>
        
        <div id="images">
            <images>
                <?php
                    $score1 = dispDice();
                    $score2 = dispDice();
                ?>
            </images>
        </div>

        <div id="score">
             <score>
                <?php
                    $double = score($score1,$score2);
                ?>
            </score>
            
            <double>
                <?php
                    isDouble($double);
                ?>
            </double>
        </div>


        <div id="rollB">
            <roll>
                roll
            </roll>
        </div>
        
    </body>

<hr>

    <footer>
        temp
    </footer>

</html>