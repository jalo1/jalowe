<?php
include 'inc/functions.php';

if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

if(!empty($_GET['dice'])) {
    $dice = $_GET['dice'];
}

if(!empty($_GET['category'])) {
    $category =$_GET['category'];
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
                if (isset($_GET['keyword'])) {
                    $pool = roll($_GET['keyword'],$_GET['category']);
                }
                ?>
            </images>
        </div>
    </body>

<hr>

<div>
    for some reason my radio and categories do not function, enter "d6" or "d8" into
    the search bar.
</div>

<form>
    <form action="index.php" method="get">
            
    <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
    
    <input type="submit" value="Roll!">
</form>     

<div>
    Select dice size!
</div>

<form>
    <input type="radio" name="dice" placeholder ="dice" value="d6"  id="ld6">
    <label for="ld6"> d6 </label>
    
    <input type="radio"  name="dice" placeholder ="dice" value="d8"  id="ld8">
    <label for="ld8"> d8 </label>
    
        
    <?php
    if(!isset($_GET['dice'])) {
     echo "ER: dice size is not set!";
    }
    ?>
    
</form>


<div>
    Select number of dice to roll!
</div>

<form>
    <select name="category">
        <option value=""> Select One</option>
        <option value="3"> 3</option>
        <option value="5"> 5</option>
        <option value="8"> 8</option>
    </select>
    
        <?php
    if(!isset($_GET['category'])) {
     echo "ER: number of dice is not set!";
    }
    ?>
    
    
</form>

    <footer>
        5+ is a success in dice pool rolling, 3 or more success is a critical roll!
    </footer>

</html>