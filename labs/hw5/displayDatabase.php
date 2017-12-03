<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection("timestamps");

$sql = "SELECT *
        FROM ts_stuff"; 
        
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

echo json_encode($record);
?>
