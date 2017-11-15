<?php 

function roll($dnumber) {
    $pool = array();
    $successPool = array();
    
    echo "<div id='dice'>";
    for ($i=0;$i<5;$i++) {
        if($dnumber == "d6") {
            $d = rand(1,6);
        }
        elseif($dnumber == "d8") {
            $d = rand(1,8);
        }
        
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
disp($pool, $dnumber);
}



function disp($pool,$dnumber){
    sort($pool);
    if($dnumber == "d6") {
        for ($i=0;$i<5;$i++){
            echo "<img src='img/d".$pool[$i].".jpg' width='100' alt='d".$d."' title='d".$d."' />";
        }
    }
    elseif($dnumber == "d8") {
        for ($i=0;$i<5;$i++){
            echo "<img src='img/d8".$pool[$i].".PNG' width='100' alt='d".$d."' title='d".$d."' />";
        }
    }

}

function myFunction() {
    location.reload();
}


?>