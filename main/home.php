<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- filter nav -->
<form action="home.php" method="post">
  <nav class="filternav">
    <div class="filter-item">  
      <label for="kategoria">Kategoria</label>
          <select name="kategoria" id="kategoria" onchange="this.form.submit()">
            <option value="">Wybierz kategorię</option>
            <option value="0">Wszystkie kategorie</option>
            <?php
              include("../phpconfig/categories_list.php");
            ?>

          </select>
    </div>
    <!-- <div class="filter-item">
      <input type="submit" class="btnfilter" value="FILTRUJ" name="filtersubmit">
    </div> -->
  </nav>
</form>


  <!-- Products -->
<section class="container-all-products">
      <?php
        include('../phpconfig/connect.php');
        if(empty($_REQUEST['kategoria'])){
              $category_cond=1;
              
        }else{
            $filtr_kategoria=$_REQUEST['kategoria'];
            $category_cond='przedmioty.kategoria_id='.$filtr_kategoria;
        }
        // sprawdzanie czy istnieją aukcje
        $isexisauctions=$connect->prepare("SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE $category_cond");
        $isexisauctions->execute();
        $res_isexisauctions = $isexisauctions->get_result();
        if($res_isexisauctions->num_rows == 0)
        {
            echo"
            <section class='container-all-products' id='defaultsection'>
                <div id='noproducts'>
                    <h1> Brak produktów do wyświetlenie o danych kryteriach </h1>
                </div>    
            </section>
            ";
        }else{

          // wyświetlanie aukcji
          $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE $category_cond ORDER BY rand()");
            
          while($row = mysqli_fetch_array($sel)){
            $nazwa=$row['nazwa'];
            $opis=$row['opis'];
            $img_name=$row['img_name'];
            $cena_wywolawcza=$row['cena_wywolawcza'];
            $cena_podbicie=$row['cena_podbicie'];
            echo"
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
            ";
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