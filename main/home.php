<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- filter nav -->
<nav>
  <form action="home.php">
    labe
  </form>
</nav>

  <!-- Products -->
<section class="container-all-products">
      <?php
        include('../phpconfig/connect.php');
        $sel=mysqli_query($connect, "SELECT * FROM `przedmioty`");
        while($row = mysqli_fetch_array($sel)){
          $nazwa=$row['nazwa'];
          $opis=$row['opis'];
          $img_name=$row['img_name'];
          $cena=$row['cena_wywolawcza'];
          echo("
          <a href='' class='link'><div class='container-product'>
            <img src='zdjecia/$img_name'>
            <div class='title_description'>
              <div class='title'> <h3>$nazwa</h3> </div>
              <div class='description'> <p>$opis</p> </div>
            </div>
            <div class='price'>
                <p>$cena zł</p>
            </div>
          </div></a>

          ");
        }
      ?>
</section>

  <!-- Benefits -->
<section class="section">
    <div class="benefit-center box">
        <div class="benefit">
            <span class="icon"><img src="../images/shipment.png"> </span>
            <h4>Darmowa dostawa</h4>
            <span class="text">Dla zamówień od 99zł</span>
        </div>

     
        <div class="benefit">
            <span class="icon"><img src="../images/return.png"></span>
            <h4>14 Dni</h4>
            <span class="text">Na darmowy zwrot</span>
        </div>

        <div class="benefit">
            <span class="icon"><img src="../images/support.png"></span>
            <h4>24/7 Pomoc techniczna</h4>
            <span class="text">Jesteśmy po to by ci pomóc</span>
        </div>
    </div>
</section>

  <!-- Section gap -->
<section class="section">
</section>


<!-- footer -->
<?php
include('static/footer.php');
?>

