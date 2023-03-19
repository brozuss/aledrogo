<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- filter nav -->
<h2>Filtry</h2>

<form action="home.php" method="post">
  <nav class="filternav">
    <div class="filter-item">  
      <label for="kategoria">Kategoria</label>
          <select name="kategoria" id="kategoria">
            <option value="0">Wszystkie kategorie</option>
            <option value="1">Komputery</option>
            <option value="2">Elektronika</option>
            <option value="3">Motoryzacja</option>
          </select>
    </div>
    <div class="filter-item">
      <label for="cena">Cena</label>
        <div><input type="number" placeholder="Od" name="cena_od">
        <input type="number" placeholder="Do" name="cena_do"></div>
    </div>
    <div class="filter-item">
      <input type="submit" class="btnfilter" value="FILTRUJ" name="filtersubmit">
    </div>
  </nav>
</form>


  <!-- Products -->
<section class="container-all-products">
      <?php
        include('../phpconfig/connect.php');
        // if(isset($_REQUEST['kategoria']) && isset($_REQUEST['cena_od']) && isset($_REQUEST['cena_do'])){
        if(isset($_REQUEST['filtersubmit'])){
          
          $filtr_kategoria=$_REQUEST['kategoria'];
          $filtr_cena_od=$_REQUEST['cena_od'];
          $filtr_cena_do=$_REQUEST['cena_do'];
          if($_REQUEST['kategoria']==0){
            $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id");
          
            while($row = mysqli_fetch_array($sel)){
              $nazwa=$row['nazwa'];
              $opis=$row['opis'];
              $img_name=$row['img_name'];
              $cena_wywolawcza=$row['cena_wywolawcza'];
              $cena_podbicie=$row['cena_podbicie'];
              echo("
              <a href='' class='link'><div class='container-product'>
                <img src='zdjecia/$img_name'>
                <div class='title_description'>
                  <div class='title'> <h3>$nazwa</h3> </div>
                  <div class='description'> <p>$opis</p> </div>
                </div>
                <div class='price'>
                    <p>$cena_podbicie zł</p>
                </div>
              </div></a>
              ");
            }
          }else{
            $sel=mysqli_query($connect, "SELECT przedmioty.nazwa, przedmioty.opis, przedmioty.img_name, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE przedmioty.kategoria_id=$filtr_kategoria AND licytacje.cena_podbicie BETWEEN $filtr_cena_od AND $filtr_cena_do");
            
            while($row = mysqli_fetch_array($sel)){
              $nazwa=$row['nazwa'];
              $opis=$row['opis'];
              $img_name=$row['img_name'];
              $cena_podbicie=$row['cena_podbicie'];
              echo("
              <a href='' class='link'><div class='container-product'>
                <img src='zdjecia/$img_name'>
                <div class='title_description'>
                  <div class='title'> <h3>$nazwa</h3> </div>
                  <div class='description'> <p>$opis</p> </div>
                </div>
                <div class='price'>
                    <p>$cena_podbicie zł</p>
                </div>
              </div></a>
              ");
            }
          }
        }else{
          $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id");
          
          while($row = mysqli_fetch_array($sel)){
            $nazwa=$row['nazwa'];
            $opis=$row['opis'];
            $img_name=$row['img_name'];
            $cena_wywolawcza=$row['cena_wywolawcza'];
            $cena_podbicie=$row['cena_podbicie'];
            echo("
            <a href='' class='link'><div class='container-product'>
              <img src='zdjecia/$img_name'>
              <div class='title_description'>
                <div class='title'> <h3>$nazwa</h3> </div>
                <div class='description'> <p>$opis</p> </div>
              </div>
              <div class='price'>
                  <p>$cena_podbicie zł</p>
              </div>
            </div></a>
            ");
          }
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

