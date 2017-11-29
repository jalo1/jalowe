<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "INSERT INTO `ts_stuff` (`userData`, `time`) 
        VALUES ('test', '2017-11-29');";  
        
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
