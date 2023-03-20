<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- main index -->
<?php
include('../phpconfig/connect.php');
$sel=mysqli_query($connect, 'SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE przedmioty.id="'.$_GET['product'].'";');
        while($row = mysqli_fetch_array($sel)){
            $produkt_id=$row['id'];
            $nazwa=$row['nazwa'];
            $opis=$row['opis'];
            $img_name=$row['img_name'];
            $cena_wywolawcza=$row['cena_wywolawcza'];
            $cena_podbicie=$row['cena_podbicie'];
            $data_wystawienia=strtotime($row['data_wystawienia']);
            $data_zakonczenia=strtotime($row['data_zakonczenia']);
            $czaszakoncz=round(($data_zakonczenia-$data_wystawienia)/86400);
            ?>
            <a href='product.php?<?php echo $nazwa,$produkt_id?>' class='link'><div class='container-product'>
              <div class='grid_img'>
                  <img src='zdjecia/<?php echo $img_name?>'>
              </div>
              <div class='grid_tytul'>
                  <?php echo $nazwa?>
              </div>
              <div class='grid_opis'>
                  <?php echo $opis?>
              </div>
              <div class='grid_cena'>
                  <?php echo $cena_podbicie?> zł
              </div>
              <div class='grid_czas'>
                  <p>Koniec aukcji za:</p>
                  <p><?php echo $czaszakoncz?> dni</p>
              </div>
            </div></a>    
<?php
        }
            ?>

<!-- footer -->
<?php
include('static/footer.php');
?>