<?php 

function dispDice() {
$d = rand(1,6);
    echo "<img src='img/d".$d.".jpg' width='100' alt='d".$d."' title='d".$d."' />";
return($d);
}

function score($score1,$score2) {
    
    echo "Roll is ".$score1+$score2."!";
    
    if($score1 == $score2) {
        return(true);
    }
    else {
        return(false);
    }
}

function isDouble($double) {
    if($double == true) {
        echo "DOUBLES!";
    }
}

$diceNumber = 0;
    if ($diceNumber == 1) {
        
    } else if($diceNumber == 2) {
        
    } else if($diceNumber == 3) {
        
    } else if($diceNumber == 4) {
        
    } else if($diceNumber == 5) {
        
    } else {
        
    }

?>