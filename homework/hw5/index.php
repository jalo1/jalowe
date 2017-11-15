<?php
include 'inc/functions.php';

if(isset($_GET['layout'])) {
    $dice = $_GET['layout'];
    echo $dice;
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
    </head>

    <body>
        <div id="top">
            <h1> Dice Pool Roller </h1>
        </div>
        
        <div id="images">
            <images>
                <?php
                    $pool = roll($dice);
                ?>
            </images>
        </div>
    </body>

<hr>

<form>
    
<form action="index.php" method="get">
    
<input type="radio" id="ld6" name="layout" value="d6">
<label for="ld6"> d6 </label>

<input type="radio" id="ld8" name="layout" value="d8" <?= ($_GET['layout']=='d8')?"checked":""  ?> >
<label for="ld8"> d8 </label>

<button onclick="myFunction()">Reload page</button>
</form>


<script>
function myFunction() {
    location.reload();
}
</script>


    <footer>
        5+ is a success in dice pool rolling, 3 or more success is a critical roll!
    </footer>

</html>