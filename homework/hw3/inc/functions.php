<?php 

function roll() {
    $pool = array();
    $successPool = array();
    echo "<div id='dice'>";
    for ($i=0;$i<5;$i++) {
        $d = rand(1,6);
        array_push($pool,$d);
        if ($pool[$i]>4){
           array_push($successPool,$pool[$i]);
        }
    }
    
    if (count($successPool) > 2) {
        echo "major success!";
    }
    else {
        echo "Degree of Success: ".count($successPool)." !";
    }
    echo "</div>";
disp($pool);
}



function disp($pool){
    sort($pool);
    for ($i=0;$i<5;$i++){
        echo "<img src='img/d".$pool[$i].".jpg' width='100' alt='d".$d."' title='d".$d."' />";
    }
}
?>