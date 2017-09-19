<?php

function x() {
    return "rgba( " .rand(0,255). " ," .rand(0,255). "," .rand(0,255). ", " .(rand(0,100)/100). " )";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <style>
            
            body {
                <?php
                $red = rand(0,255);
                $green = rand(0,255);
                $blue = rand(0,255);
                $alpha = rand(0,100) / 100;
                echo "background-color: " . x();
                ?>
            }
            
            h1 {
                <?php
                echo "background-color: " . x();
                ?>
            }
            
                
            h2 {
                background-color: <?=x()?>
            }
                
            
        </style>

        <h1>
            hello!
        </h1>

        <h2>
            tester!
        </h2>

    </body>
</html>