<?php
    include 'inc/header.php';
?>
            
        <!-- add Carousel component -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">


    

<?php
 fillCar();
?>
    

    
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


        <br /><br />
        <a class="btn btn-outline-primary" href="adoptions.php" role="button">Adopt Now! </a>

        <br /><br />
        <hr>
        
<?php
    include 'inc/footer.php';
?>