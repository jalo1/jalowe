<?php
session_start();

include '../../dbConnection.php';
$conn = getDatabaseConnection("soloProject");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM sp_admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

if (empty($record)) {
    header("Location: index.php"); //redirecting to admin portal
} else {
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    header("Location: admin.php"); //redirecting to admin portal
}
?>