<?php
// db connect
include('../phpconfig/connect.php');

$id_uzytkownika = $_SESSION['user'];

$ogloszenie = $connect->prepare("SELECT * FROM `przedmioty` WHERE `sprzedajacy_id`=$id_uzytkownika");
$ogloszenie->execute();
$res_ogloszenie = $ogloszenie->get_result();

if ($res_ogloszenie->num_rows == 0) {
?>
    <section class='container-all-products'>
        <div id='noproducts'>
            <h1> Tutaj będą widoczne <span>twoje</span> ogłoszenia </h1>
        </div>
    </section>
<?php

} else {
?>
    <!-- wyswietlanie rekordow -->
    <section class="container-all-products">
        <?php
        include('../phpconfig/connect.php');
        $current_user = $_SESSION['user'];

        $sel = mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE sprzedajacy_id=$current_user ORDER BY przedmioty.id asc");

        while ($row = mysqli_fetch_array($sel)) {
          $produkt_id = $row['id'];
          $nazwa = $row['nazwa'];
          $opis = $row['opis'];
          $img_name = $row['img_name'];
          $cena_wywolawcza = $row['cena_wywolawcza'];
          $cena_podbicie = $row['cena_podbicie'];
          $data_wystawienia = strtotime($row['data_wystawienia']);
          $data_zakonczenia = strtotime($row['data_zakonczenia']);
          $dnidozakoncz = round(($data_zakonczenia - strtotime("now")) / 86400);
          $dniodzakoncz = round((strtotime("now") - $data_zakonczenia) / 86400);
  ?>
          <a href='product.php?product=<?php echo $row['id'] ?>' class='link'>
              <div class='container-product'>
                  <div class='grid_img'>
                      <img src='zdjecia/<?php echo $img_name ?>' class="imgimg">
                      <?php
                            if($row['zakonczona']==1){?>
                                <img src="../images/zakonczone.png" class="ended">
                            <?php
                            }
                        ?>
                  </div>
                  <div class='grid_tytul'>
                      <?php echo $nazwa ?>
                  </div>
                  <div class='grid_opis_data'>
                      <div class="opis">
                          <?php echo $opis ?>
                      </div>
                      <div class="data">
                        <?php 
                        if($dniodzakoncz>0){
                            echo 'Aukcja zakończyła się: ';
                            if($dniodzakoncz>1){ 
                              echo $dniodzakoncz.' dni temu';
                            }else{
                              echo $dniodzakoncz*24 .' godzin temu';
                            }
                        }else{
                            echo 'Aukcja zakończy się za: ';
                              if($dnidozakoncz>1){ 
                                echo $dnidozakoncz.' dni';
                              }else{
                                echo $dnidozakoncz*24 .' godziny';
                              }
                        }
                        ?>
                      </div>
                  </div>
                  <div class='grid_cena_orders'>
                      <p>Cena początkowa:</p>
                      <?php echo $cena_wywolawcza ?> zł<br><br>
                      <p>Cena aktualna:</p>
                      <?php echo $cena_podbicie ?> zł
                  </div>

              </div>
          </a>
  <?php
      }
  }
  ?>
</section>