<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
include('../phpconfig/update_bid_status.php');
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
  if (empty($_REQUEST['kategoria'])) {
    $category_cond = 1;
  } else {
    $filtr_kategoria = $_REQUEST['kategoria'];
    $category_cond = 'przedmioty.kategoria_id=' . $filtr_kategoria;
  }
  // sprawdzanie czy istnieją aukcje
  $isexisauctions = $connect->prepare("SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE $category_cond and przedmioty.data_zakonczenia>CURRENT_DATE");
  $isexisauctions->execute();
  $res_isexisauctions = $isexisauctions->get_result();
  if ($res_isexisauctions->num_rows == 0) {
    echo "
            <section class='container-all-products' id='defaultsection'>
                <div id='noproducts'>
                    <h1> Brak produktów do wyświetlenie o danych kryteriach </h1>
                </div>    
            </section>
            ";
  } else {

    // wyświetlanie aukcji
    $sel = mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE $category_cond AND przedmioty.data_zakonczenia>CURRENT_DATE ORDER BY rand()");

    while ($row = mysqli_fetch_array($sel)) {
      $produkt_id = $row['id'];
      $nazwa = $row['nazwa'];
      $opis = $row['opis'];
      $img_name = $row['img_name'];
      $cena_wywolawcza = $row['cena_wywolawcza'];
      $cena_podbicie = $row['cena_podbicie'];
      $data_wystawienia = strtotime($row['data_wystawienia']);
      $data_zakonczenia = strtotime($row['data_zakonczenia']);
      $czaszakoncz = round(($data_zakonczenia - strtotime("now")) / 86400);
  ?>
      <a href='product.php?product=<?php echo $row['id'] ?>' class='link'>
        <div class='container-product'>
          <div class='grid_img'>
            <img src='zdjecia/<?php echo $img_name ?>'>
          </div>
          <div class='grid_tytul'>
            <?php echo $nazwa ?>
          </div>
          <div class='grid_opis'>
            <?php echo $opis ?>
          </div>
          <div class='grid_cena'>
            <?php echo $cena_podbicie ?> zł
          </div>
          <div class='grid_czas'>
            <p>Koniec aukcji za:</p>
            <p><?php echo $czaszakoncz ?> dni</p>
          </div>
        </div>
      </a>
  <?php
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