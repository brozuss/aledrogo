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
      <input type="submit" class="btnfilter" value="FILTRUJ" name="filtersubmit">
    </div>
  </nav>
</form>


  <!-- Products -->
<section class="container-all-products">
      <?php
        include('../phpconfig/connect.php');
        if(isset($_REQUEST['kategoria'])){
        
          $filtr_kategoria=$_REQUEST['kategoria'];
          if($_REQUEST['kategoria']==0){
            $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id order by rand()");
          
            while($row = mysqli_fetch_array($sel)){
              $nazwa=$row['nazwa'];
              $opis=$row['opis'];
              $img_name=$row['img_name'];
              $cena_wywolawcza=$row['cena_wywolawcza'];
              $cena_podbicie=$row['cena_podbicie'];
              ?>
              <a href='' class='link'><div class='container-product'>
                <img src="<?php echo'zdjecia/'.$img_name?>">
                <div class='title_description'>
                  <div class='title'> <h3><?php echo $nazwa?></h3> </div>
                  <div class='description'> <p><?php echo $opis?></p> </div>
                </div>
                <div class='price'>
                    <p><?php echo $cena_podbicie .'zł'?></p>
                </div>
              </div></a>
              <?php
            }
          }else{
            $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE przedmioty.kategoria_id=$filtr_kategoria ORDER BY rand()");
          
            while($row = mysqli_fetch_array($sel)){
              $nazwa=$row['nazwa'];
              $opis=$row['opis'];
              $img_name=$row['img_name'];
              $cena_wywolawcza=$row['cena_wywolawcza'];
              $cena_podbicie=$row['cena_podbicie'];
              ?>
              <a href='' class='link'><div class='container-product'>
                <img src="<?php echo'zdjecia/'.$img_name?>">
                <div class='title_description'>
                  <div class='title'> <h3><?php echo $nazwa?></h3> </div>
                  <div class='description'> <p><?php echo $opis?></p> </div>
                </div>
                <div class='price'>
                    <p><?php echo $cena_podbicie .'zł'?></p>
                </div>
              </div></a>
              <?php
            }
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