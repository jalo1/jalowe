<?php
$backgroundImage = "img/sea.jpg";
//check out form methods, post and get. that effects $_POST or $_GET

if (isset($_GET['keyword'])) {
    echo  "Keyword typed: " . $_GET['keyword'];
    
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    print_r($imageURLs);
    
} else {
    echo "<h2> type a keyword to display </h2>";
}
?>

<html>
    <head>
        <title> Lab 4: Pixabay Carousel </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("css/styles.css");
        
        body {
            background-image: url(<?=$backgroundImage?>);
        }
        
        
        </style>
        
    </head>
    <body>
        
        
        
        
        
        <form>
            <input type="text" name="keyword"/>
            
            <input type="radio" id="lhorizontal" name="layout" value="horizontal"><label for="lhorizontal"> Horizontal </label>
            <input type="radio" id="lvertical" name="layout" value=0><label for="lvertical"> Vertical </label>
            
            
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
            </select>
            
            
            <input type="submit" value="Go!" name="submitBtn" />
        </form>
        
        
        <?php
        if(empty($_GET['keyword'])) {
            echo "<div> you must type a keyword or select a category </div>";
        }
        ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>