<?php
include '../../dbConnection.php';
if (isset($_GET['submit'])) {
    $conn = getDatabaseConnection("timestamps");
    
    $sql = "INSERT INTO `ts_stuff` (`userData`) 
            VALUES ('".$_GET['name']."');";  
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    }
    
    
function history() {
    global $conn;
    $conn = getDatabaseConnection("timestamps");
    $sql = "SELECT userData
                FROM ts_stuff
                WHERE tsID IN (SELECT MAX(tsID) FROM ts_stuff)";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $sql = "SELECT COUNT(userData) 
            FROM `ts_stuff` 
            WHERE userData = '".$record['userData']."'"; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record2 = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo $record['userData'] . " has been searched " . $record2['COUNT(userData)'] ." times."; 

    $sql = "SELECT userData, time
            FROM `ts_stuff`
            WHERE userData = '".$record['userData']."'"; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<br>";
    foreach($records as $record) {
        echo "<br>";
        echo $record['userData']." ".$record['time'];
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> AJAX </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    
    
    
    <style type="text/css" id="diigolet-chrome-css">
</style>
</head>

<body>
    <form>
        Pokemon ID (use numbers):
        <input type="text" required id="pID">

        <input id="btn" type="button" class="btn btn-primary" value="search!" />
        <br>
        Name: <span id="name" value="entry" name="name"></span> <br>
        Height: <span id="height" ></span> <br>
        Weight: <span id="weight" ></span> <br>
        <input type="hidden"  name="name" id="iname" />
        <input type="hidden" name="height" id="iheight" />
        <input type="hidden" name="weight" id="iweight" />
        
        <input type="submit" name="submit" type="button" class="btn btn-primary" value="submit!">
    </form>

<div>
    <?=history();?>
</div>

    <iframe src="displayDatabase.php"></iframe>

    
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
    
    var id = 0
    var v1 = 0
    
    function test() {
    //var id=$("#pID").val();
    //$("#test").text(id);
    $.ajax({
            type: "GET",
            url: "https://pokeapi.co/api/v2/pokemon/"+$("#pID").val()+"/",
            //url: "https://pokeapi.co/api/v2/pokemon/"+"1"+"/",
            dataType: "json",
            data: { },
            success: function(data,status) {
               //alert(data.name);
                $("#name").html(data.name);
                $("#height").html(data.height);
                $("#weight").html(data.weight);
                
                $("#iname").val(data.name);
                $("#iheight").val(data.height);
                $("#iweight").val(data.weight);
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }
            
            });//ajax
            
            updateDatabase();
            
    }
            
    function getID() {
        id = $("#pID").val();
        alert(id)
    }        

      $(document).ready(function() {
        $('#btn').click(function() {test();});
        //$("#pID").change( function(){ getID(); } );
        //$('#pID').on('change', function () { getID(); }).change();
      } ); 
    </script>
    
    
</body>


</html>