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
          $data_wystawienia=strtotime($row['data_wystawienia']);
          $data_zakonczenia=strtotime($row['data_zakonczenia']);
          $czaszakoncz=round(($data_zakonczenia-$data_wystawienia)/86400);
?>
            <section class='container-all-products' id='defaultsection'>
            <a href='product.php?product=<?php echo $row['id']?>' class="link">
            <div class='container-product'>
            <div class='grid_img'>
                <img src='zdjecia/<?php echo $img_name?>'>
            </div>
            <div class='grid_tytul'>
                <?php echo $nazwa ?>
            </div>
            <div class='grid_opis'>
                <?php echo $opis ?>
            </div>
            <div class='grid_cena'>
                <?php echo $cena_podbicie ?>zł
            </div>
            <div class='grid_czas'>
                Koniec aukcji za:
                <?php echo $czaszakoncz ?>dni
            </div>
        </div></a>    
            </section>
<?php
        }
}    
      ?>
</section>
    
    
    
    
    
    
    
    