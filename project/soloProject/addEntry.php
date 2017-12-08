<?php
session_start();

include("../../dbConnection.php");
$conn = getDatabaseConnection("soloProject");
    
if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    header("Location: index.php");
}

if (isset($_GET['addUserForm'])) {
    //echo "INSERT INTO `sp_pokemon` (`dbID`, `name`, `height`, `weight`, `pokeID`) 
    //      VALUES (NULL,".$_GET['name'].", ".$_GET['height'].",".$_GET['weight'].",".$_GET['index'].")";
          
        $name = $_GET['name'];
        $height = $_GET['height'];
        $weight    = $_GET['weight'];
        $pokeID = $_GET['index'];
        
        $namedParameters = array();
        $namedParameters[':name'] =  $name;
        $namedParameters[':height'] =  $height;
        $namedParameters[':weight'] =  $weight;
        $namedParameters[':pokeID'] =  $pokeID;
    
        $sql = "INSERT INTO `sp_pokemon` (`dbID`, `name`, `height`, `weight`, `pokeID`) 
          VALUES (NULL, :name, :height, :weight, :pokeID)";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New Pokemon </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
       
        <link href="css/styles.css" rel="stylesheet" type="text/css" />    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Adding New Pokemon </h2>

    <fieldset>
        
        <legend> Add New Pokemon </legend>
        
        <form>
        Pokemon Index: <input type="text" id="pID" required /> <br>
        Name: <span id="name" name="name" ></span> 
                        <br>
        Height: <span id="height" name="height"></span> 
                        <br>
        Weight: <span id="weight" name="weight"></span> 
                        <br>
        Index: <span id="index" name="index"></span> 
                        <br>
                        
            <input type="hidden" name="name" id="iname" />
            <input type="hidden" name="height" id="iheight" />
            <input type="hidden" name="weight" id="iweight" />
            <input type="hidden" name="index" id="iindex" />
            
                        
            <input id="btn" type="button" value="search!" />
                        <br>
            <input type="submit" name="addUserForm" value="add!"/>
                        <br>
        </form>
        
        <br>
        
        <form method="POST" action="admin.php">
            <input type="submit" name="login" value="exit"/>
        </form>
        
    </fieldset>


    </body>
</html>
            
            
            
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>

    function api() {
    
    
        
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
                $("#index").html(data.id);
                
                $("#iname").val(data.name);
                $("#iheight").val(data.height);
                $("#iweight").val(data.weight);
                $("#iindex").val(data.id);
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }
            
            });//ajax
    }
    
    $(document).ready(function() {
        $('#btn').click(function() {api();});
    } ); 
    
</script>