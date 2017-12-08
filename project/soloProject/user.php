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