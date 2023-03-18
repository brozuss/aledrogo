<?php
// db connect
include('../phpconfig/connect.php');

$id_uzytkownika=$_SESSION['user'];

$ogloszenie=$connect->prepare("SELECT * FROM `przedmioty` WHERE `sprzedajacy_id`=$id_uzytkownika");
$ogloszenie->execute();
$res_ogloszenie = $ogloszenie->get_result();

if($res_ogloszenie->num_rows == 0){
    echo('brak ogloszen');

}else{
    // wyswietlanie rekordow
    $sel=mysqli_query($connect, "SELECT * FROM `przedmioty` WHERE `sprzedajacy_id`=$id_uzytkownika");
    while($row = mysqli_fetch_array($sel)){
        $nazwa=$row['nazwa'];
        $opis=$row['opis'];
        $img_name=$row['img_name'];
        $cena=$row['cena_wywolawcza'];
        $data_wystawienia=$row['data_wystawienia'];
        $data_zakonczenia=$row['data_zakonczenia'];
        $kategoria_id=$row['kategoria_id'];
    
    
    
    
    
    
    
    }
}
?>      