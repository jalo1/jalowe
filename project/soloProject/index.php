<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Solo Project </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <h1> Admin Login </h1>
        <form method="POST" action="loginProcess.php">
            ADMIN: <br>
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
        </form>
        
        <form method="POST" action="user.php">
            USER: <br>
            Username: <input type="text" name="user" id="user"/> <br />
            <button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
        </form>

    </body>
</html>