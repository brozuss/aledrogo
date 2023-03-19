<?php
// db connect
include('../phpconfig/connect.php');

$id_uzytkownika=$_SESSION['user'];

$ogloszenie=$connect->prepare("SELECT * FROM `przedmioty` WHERE `sprzedajacy_id`=$id_uzytkownika");
$ogloszenie->execute();
$res_ogloszenie = $ogloszenie->get_result();

if($res_ogloszenie->num_rows == 0){
    ?>
            <section class='container-all-products'>
                <div id='noproducts'>
                    <h1> Tutaj będą widoczne <span>twoje</span> ogłoszenia </h1>
                </div>    
            </section>
    <?php

}else{
    ?>
     <!-- wyswietlanie rekordow -->
    <section class="container-all-products">
      <?php
        include('../phpconfig/connect.php');
        $current_user=$_SESSION['user'];

        $sel=mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE sprzedajacy_id=$current_user ORDER BY rand()");
          
        while($row = mysqli_fetch_array($sel)){
          $nazwa=$row['nazwa'];
          $opis=$row['opis'];
          $img_name=$row['img_name'];
          $cena_wywolawcza=$row['cena_wywolawcza'];
          $cena_podbicie=$row['cena_podbicie'];
          echo"
            <a href='/main/product.php' class='link'><div class='container-product'>
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
    
    
    
    
    
    
    
    