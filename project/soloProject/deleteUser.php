<?php

    include("../../dbConnection.php");
    $conn = getDatabaseConnection("soloProject");
    $sql = "DELETE FROM sp_pokemon 
            WHERE pokeID = " . $_GET['userId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
?>