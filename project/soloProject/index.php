<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Solo Project </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <h1> Admin Login </h1>
        <form method="POST" action="loginProcess.php">
            ADMIN: <br>
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
        </form>
        
        <form method="POST" action="user.php">
            USER: <br>
            Username: <input type="text" name="user" id="user"/> <br />
            <?php $_SESSION['user'] = $_GET['user']; ?>
            <input type="submit" name="login" value="Login"/>
        </form>

    </body>
</html>