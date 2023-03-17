<?php 
    include('../phpconfig/connect.php');    //database connect
            
    // wyświetlanie nazwy uzytkownika
    $id_uzytkownika=$_SESSION['user'];
            
    $imie_uzytkownika=$connect->prepare("SELECT imie FROM uzytkownicy WHERE id='$id_uzytkownika'");
    $imie_uzytkownika->execute();
    $res_imie_uzytkownika = $imie_uzytkownika->get_result();
    if($res_imie_uzytkownika->num_rows == 1){
        $res_imie_uzytkownika = $res_imie_uzytkownika->fetch_assoc();
        $finalres_imie_uzytkownika=implode($res_imie_uzytkownika);
        echo $finalres_imie_uzytkownika;
    }
?>