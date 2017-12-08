<?php
    session_start();
    
    if (!isset($_SESSION['username'])) { //checks whether admin has logged in
        header("Location: index.php");
        exit();
    }
    
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

        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        <form>
            Filter Controls:  <br>
            duplicates: <input type="radio" name="duplicates" />
            heaviest: <input type="radio" name="heavy" /> 
            lightest: <input type="radio" name="light" /> <br>
            <button type="submit" class="btn btn-warning" name="filter" value="filter">Filter</button>
        </form>
        <br>
        
        <form action="addEntry.php">
            <button type="submit" class="btn btn-warning">Add new pokemon</button>
        </form>
        
        <form action="logout.php">
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
        
        <br /><br />

        <?php
        $pokedex =displayUsers();
        foreach($pokedex as $pokemon) {
            echo "PokeID: ".$pokemon['pokeID']." -- : ".$pokemon['name'];
            //echo "<a href='displayInfo.php?pokeID=".$pokemon['pokeID']."'> ".$pokemon['name']."</a>";
            echo "[<a 
    href='updateUser.php?name=" .$pokemon['name']. "&weight=" .$pokemon['weight']. "&height=" .$pokemon['height']. "&pokeID=" .$pokemon['pokeID']. "'> Update </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$pokemon['pokeID']."\")'>
                     <input type='hidden' name='userId' value='".$pokemon['pokeID']."' />
                     <button type='submit' class='btn btn-danger' value='delete'>DELETE</button>
                  </form>
                ";
            echo "<br />";
        }
        ?>
    </body>     
</html>

