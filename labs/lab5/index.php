<?php
include '../../dbConnection.php';

$conn = getDatabaseConnection();

function getDeviceTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
}

function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM tc_device WHERE 1 ";

    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        if (!empty($_GET['deviceName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }
         
        if (!empty($_GET['deviceType']) && $_GET['deviceType'] != "Select One") {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND deviceType = :dType"; //using named parameters
            $namedParameters[':dType'] =   $_GET['deviceType'] ;

         }     
         
         if (isset($_GET['available'])) {
             $sql .= " AND status = 'A'"; //using named parameters
         }
         
         if (isset($_GET['orderBy'])) {
             
             if($_GET['orderBy'] == "name") {
                 $sql .= " ORDER BY deviceName ASC";
             }
             else {
                 $sql .= " ORDER BY price ASC";
             }
         }
}
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) {
        
        echo  $record['deviceName'] . " " . $record['deviceType'] . " " .
              $record['price'] .  "  " . $record['status'] . 
              "<a target='checkoutHistory' href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br />";
        
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Device Search </title>
        <meta charset="utf-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1> Technology Center: Checkout System </h1>
        
        <form>
            Device: <input type="text" name="deviceName" placeholder="Device Name"/>
            Type: 
            <select name="deviceType">
                <option>Select One</option>
                <?=getDeviceTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            <br>
            Order by:
            <input type="radio" name="orderBy" id="orderByName" value="name"/> 
             <label for="orderByName"> Name </label>
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/> 
             <label for="orderByPrice"> Price </label>
            
            
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        
        
        <hr>
        
        <?=displayDevices()?>
        
        
        
        <iframe name="checkoutHistory" width="400" height="400"></iframe>
        



    </body>
</html>