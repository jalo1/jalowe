<!DOCTYPE html>
<?php
function yearlist($startyear,$endyear) {
$yearsum = 0;
$zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
//with isset, can type straight into the URL code: ?start=1900
$counter = 0;
for ($x = $startyear; $x <= $endyear; $x++) {
    
    echo "<img src='zodiac/".$zodiac[$counter%(count($zodiac))].".png' width='100'/>";
    
    if($x == 1776)
    {
        echo "<li> year $x USA INDEPENDENCE </li>";
    }
    elseif ($x%100 == 0) {
        echo "<li> year $x NEW C </li>";
    }
    else {
        echo "<li> year $x </li>";
    }
    $yearsum = $yearsum + $x;
} 


return($yearsum);
}
?>


<html>
    <head>
        <title> </title>
    </head>
    <body>
       
       
       <h1>chinese zodiac</h1>
       <input type="text" name="keyword"/>
       <input type="submit" value="Go!" name="submitBtn" />
       <ul> 
       
           <?php
           $_GET['keyword'];
           $startyear = 1500;
           $endyear = 2000;
            $sum = yearlist(1000,1500);
            ?>
            
       </ul>
    <?php
    echo "year sum: $sum <br/>";
    ?>
    
    </body>
</html>