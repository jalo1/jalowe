<?php
function chooseCards($randomSuit, $randomCard) {
    if($randomSuit == 0) {
        echo "<img src=\"img/cards/hearts/".cardTranslate($randomCard).".png\" alt=\"hearts\" title=\"hearts\" width=\"70\"/>";
    } else if ($randomSuit == 1) {
        echo "<img src=\"img/cards/clubs/".cardTranslate($randomCard).".png\" alt=\"hearts\" title=\"hearts\" width=\"70\"/>";
    } else if ($randomSuit == 2) {
        echo "<img src=\"img/cards/diamonds/".cardTranslate($randomCard).".png\" alt=\"hearts\" title=\"hearts\" width=\"70\"/>";
    } else {
        echo "<img src=\"img/cards/spades/".cardTranslate($randomCard).".png\" alt=\"hearts\" title=\"hearts\" width=\"70\"/>";
    }
}

function cardTranslate($randomCard) {
    if($randomCard == 0) {
        return "ten";
    } else if ($randomCard == 1) {
        return "jack";
    } else if ($randomCard == 2) {
        return "queen";
    } else if ($randomCard == 3) {
        return "king";
    } else {
        return "ace";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Card Game</title>
        <meta charset="utf-8"/>
    </head>
    <body>
        <h1>Random Card Game</h1>
        <span>
            Player 1.....Player 2
        </span>
        <div>
        <?php
            $p1= rand(0, 4);
            $r1= rand(0, 5);
            chooseCards($p1, $r1);
            $p2= rand(0, 4);
            $r2= rand(0, 5);
            chooseCards($p2, $r2);
            
        ?>
        </div>
    </body>
    <hr>
    <footer>
        <h2>
        <?php
            if($r1 > $r2) {
                echo "Player 1 wins!";
            } else if($r1 < $r2) {
                echo "Player 2 wins!";
            } else {
                echo "Tie!";
            }
        ?>
        </h2>
    </footer>
</html>