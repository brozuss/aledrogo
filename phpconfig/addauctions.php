<?php
if(isset($_REQUEST['tytul']) && isset($_REQUEST['kategoria']) && isset($_REQUEST['cena']) && isset($_REQUEST['opis'])){
    
    include('../phpconfig/connect.php');    //database connect

    $sprzedajacy_id=$_SESSION['user'];
    $tytul=$_REQUEST['tytul'];
    $opis=$_REQUEST['opis'];
    $zdjecie='dsa';   
    $data_wystawienia=date('Y-m-d H:i:s');
    $data_zakonczenia=date("Y-m-d H:i:s", strtotime('+1 month'));
    $cena=$_REQUEST['cena'];
    $kategoria=$_REQUEST['kategoria'];
    
    // sprawdzanie czy pola uzupełnione
    if(!empty($tytul) && !empty($opis) && !empty($zdjecie) && !empty($cena) && !empty($kategoria)){
        // dodawanie zdjęć
        

        // dodawanie przedmiotu
        $add_bid=$connect->prepare("INSERT INTO `przedmioty` VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);");
        $add_bid->bind_param("isssissi",$sprzedajacy_id, $tytul, $opis, $zdjecie, $cena, $data_wystawienia, $data_zakonczenia, $kategoria);
        $add_bid->execute();
        header('Location:http://localhost/aledrogo/main/auctions.php');
    }else{
        echo('Wszystkie pola są wymagane!');
    }
}
?>