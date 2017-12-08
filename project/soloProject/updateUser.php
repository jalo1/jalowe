<?php
session_start();
if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection("soloProject");


/* maybe get types?
function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
}
*/


function getUserInfo($userId) {
    
    global $conn;    
    $sql = "SELECT * 
            FROM sp_pokemon
            WHERE pokeID=".$userId;
    $statement = $conn->prepare($sql);
    $statement->execute();
    $pokedex = $statement->fetch(PDO::FETCH_ASSOC);
    return $pokedex;
    
}

if (isset($_GET['fakemon'])) {
    global $conn;
    
    $sql = "INSERT INTO `sp_custom` (`fdbID`, `name`, `height`, `weight`, `fpokeID`) 
          VALUES (NULL, :name, :height, :weight, :pokeID)";
    $namedParameters[":name"] = $_GET['name'];
	$namedParameters[":height"] = $_GET['height'];
	$namedParameters[":weight"] = $_GET['weight'];
	$namedParameters[":pokeID"] = $_GET['pokeID'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
}

if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user
    global $conn;
    $sql = "UPDATE sp_pokemon
            SET name = :name,
                height = :height,
                weight = :weight,
                pokeID = :pokeID
			WHERE pokeID = :pokeID";
	$namedParameters = array();
	$namedParameters[":name"] = $_GET['name'];
	$namedParameters[":height"] = $_GET['height'];
	$namedParameters[":weight"] = $_GET['weight'];
	$namedParameters[":pokeID"] = $_GET['pokeID'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    
if(isset($_GET['pokeID'])) {
    $userInfo = getUserInfo($_GET['pokeID']);
}
    
}

function go() {
    $userInfo = getUserInfo($_GET['pokeID']);
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />

    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating User Info </h2>

    <fieldset>
        
        
    <?php
    go();
    ?>
        <legend> Update User </legend>
        
        <form>
            Name: <input type="text" name="name" value="<?=$_GET['name']?>" /> <br>
            Weight: <input type="text" name="weight" required value="<?=$_GET['weight']?>"/> <br>
            Height: <input type="text" name="height" required value="<?=$_GET['height']?>"/> <br>
            pokeID: <input type="text" name="pokeID" required value="<?=$_GET['pokeID']?>"/> <br>
<!--
            Role:   <select name="role">
                        <option value=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            /*
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            */
                            ?>
                            
                        </select>
-->
                        <br />
                <input type="submit" name="updateUserForm" value="Update Pokemon!"/> <br>
                <input type="submit" name="fakemon" value="Update Fakemon!"/>
        </form>
        
        <form method="POST" action="admin.php">
            <input type="submit" name="login" value="exit"/>
        </form>
        
    </fieldset>


    </body>
</html>