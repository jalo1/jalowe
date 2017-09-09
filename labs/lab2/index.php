<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <style type="text/css">
        @import url("css/styles.css");
    </style>
    
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    
    <body>
        <div id = "main">
            <?php
            play();
            ?>
            
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
    </body>
</html>