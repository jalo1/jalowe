<?php
    session_start();
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("soloProject");
    
    function displayUsers() {
        global $conn;
        $sql = "SELECT * 
                FROM sp_pokemon
                ORDER BY pokeID";
                
    if(isset($_GET['heavy'])) {
        $sql = "SELECT name, pokeID
                FROM sp_pokemon
                WHERE height IN (SELECT MAX(height) FROM sp_pokemon)";
    }
    
    if(isset($_GET['light'])) {
        $sql = "SELECT name, pokeID
                FROM sp_pokemon
                WHERE height IN (SELECT MIN(height) FROM sp_pokemon)";
    }
    
    if(isset($_GET['duplicates'])) {
        $sql = "SELECT *
                FROM sp_pokemon
                GROUP BY pokeID
                HAVING COUNT(pokeID)>1";
    }
        $statement = $conn->prepare($sql);
        $statement->execute();
        $pokedex = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $pokedex;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
       
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script>
            function confirmDelete(firstName) {
                return confirm("Are you sure you want to delete " + firstName + "?");
            }
        </script>
    </head>
    <body>

        <h1> USER PAGE </h1>
        <h2> Welcome <?=$_SESSION['user']?>! </h2>
        
        
        <form>
            Filter Controls:  <br>
            duplicates: <input type="radio" name="duplicates" />
            heaviest: <input type="radio" name="heavy" /> 
            lightest: <input type="radio" name="light" /> <br>
            <input type="submit" name="filter" value="filter">
        </form>
        
        <form action="logout.php">
            <input type="submit" value="Logout" />
        </form>
        
        
        <hr>
        
        <?php
        $pokedex =displayUsers();
        foreach($pokedex as $pokemon) {
            echo "PokeID: ".$pokemon['pokeID']." -- : ".$pokemon['name']. "<br>";
        }
        ?>
        
        <br /><br />

    </body>     
</html>