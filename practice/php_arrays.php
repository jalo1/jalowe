<?php

function displaySymbol($symbols) {
    echo "<img src='../labs/lab2/img/$symbols.png' width='70' />";
    
}

$symbols = array("lemon","orange","cheery");
echo $symbols[0];

//print_r($symbols); // displays array contents
//echo %symbols[0]; // displays first element
//displaySymbol($symbols[2]);

$symbols[] = "grapes"; // adds element to end of array. used for single variables
//$symbols[2] = "seven"; //replaces value

array_push($symbols, "seven"); //adds element at the end of the array. Used for multiple additions or other arrays.
//displaySymbol($symbols[4]);

for ($i=0;$i<count($symbols);$i++) {
    displaySymbol($symbols[$i]);
}
sort($symbols); //sort elements in ascending order
print_r($symbols);


//shuffle($symbols);
echo "<hr>";
print_r($symbols);


$lastSymbol = array_pop($symbols); //retrieves and removes last element of an array
echo "<hr>";
displaySymbol($lastSymbol);


foreach ($symbols as $s) {
    displaySymbol($s);
}

echo "<hr>";
unset($symbols[2]); //deletes and element from the array
$symbols = array_values($symbols); // re-indexes the array

//display a random symbol
displaySymbol($symbols[rand(0,count($symbols)-1)]);

?>

