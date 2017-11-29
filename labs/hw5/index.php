<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> AJAX </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <style type="text/css" id="diigolet-chrome-css">
</style>
</head>

<body>
    <form>

    Pokemon ID (use numbers):
    <input type="text" name="pID">
    
    Extended Info:
    <input type="radio" name="exinfo" value="yes">
    <br>
    
    <input id="btn" type="button" value="search!" />
    <br>
    Name: <span id="name" value="entry"></span> <br>
    Height: <span id="height"></span> <br>
    Weight: <span id="weight"></span> <br>
    Tester: <span id="test"></span> <br>
        
    </form>

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
            //url: "https://pokeapi.co/api/v2/pokemon/"+$("#pID").val()+"/",
            url: "https://pokeapi.co/api/v2/pokemon/"+"1"+"/",
            dataType: "json",
            data: { },
            success: function(data,status) {
               //alert(data.name);
                $("#name").html(data.name);
                $("#height").html(data.height);
                $("#weight").html(data.weight);
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

    function updateDatabase() {
        <?php
            include '../../dbConnection.php';
            $conn = getDatabaseConnection();
            
            $sql = "INSERT INTO `ts_stuff` (`userData`, `time`) 
                    VALUES ('test', '2017-11-29');";  
                    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        ?>
    }
            
      $(document).ready(function() {
        $('#btn').click(function() {test();});
        
        $("#pID").change( function(){ getID(); } );
        
        $('#pID').on('change', function () { getID(); }).change();
          
      } ); 

    </script>
    
    
</body>


</html>