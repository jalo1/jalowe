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

<form>
    
<form action="index.php" method="get">
    
<input type="radio" id="ld6" name="layout" value="d6">
<label for="ld6"> d6 </label>

<input type="radio" id="ld8" name="layout" value="d6" <?= ($_GET['layout']=='d8')?"checked":""  ?> >
<label for="ld8"> d8 </label>



</form>

<form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            

            
             <?php
                if ($_GET['layout']=="vertical") {
                    echo "checked";
                }
             
             ?>
            
>
            
<button onclick="myFunction()">Reload page</button>

<script>
function myFunction() {
    location.reload();
}
</script>


    <footer>
        5+ is a success in dice pool rolling, 3 or more success is a critical roll!
    </footer>

</html>