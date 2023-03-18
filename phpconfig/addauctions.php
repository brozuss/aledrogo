<?php
if(isset($_REQUEST['tytul']) && isset($_REQUEST['kategoria']) && isset($_REQUEST['cena']) && isset($_REQUEST['opis']) && isset($_FILES['zdjecie'])){
    
    include('../phpconfig/connect.php');    //database connect

    $sprzedajacy_id=$_SESSION['user'];
    $tytul=$_REQUEST['tytul'];
    $opis=$_REQUEST['opis'];
    $zdjecie=$_FILES['zdjecie']['name'];   
    $data_wystawienia=date('Y-m-d H:i:s');
    $data_zakonczenia=date("Y-m-d H:i:s", strtotime('+1 month'));
    $cena=$_REQUEST['cena'];
    $kategoria=$_REQUEST['kategoria'];
    
    // sprawdzanie czy pola uzupełnione
    if(!empty($tytul) && !empty($opis) && !empty($zdjecie) && !empty($cena) && !empty($kategoria)){
        // dodawanie zdjęć
        $temp_name = $_FILES['zdjecie']['tmp_name'];
        $zdjecie_rozszerzenie = pathinfo($zdjecie, PATHINFO_EXTENSION);
        $dozwolone_rozszerzenia = array("jpg","png","gif","jpeg");
        if (in_array($zdjecie_rozszerzenie, $dozwolone_rozszerzenia)) {
            $unique_imgname=uniqid(rand(), true) .$zdjecie;
            $sciezka = 'zdjecia/'. $unique_imgname;
            move_uploaded_file($temp_name, $sciezka);
                
            // dodawanie przedmiotu
            $add_bid=$connect->prepare("INSERT INTO `przedmioty` VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);");
            $add_bid->bind_param("isssissi",$sprzedajacy_id, $tytul, $opis, $unique_imgname, $cena, $data_wystawienia, $data_zakonczenia, $kategoria);
            $add_bid->execute();
            header('Location:http://localhost/aledrogo/main/auctions.php');
        }

        
    }else{
        echo('Wszystkie pola są wymagane!');
    }
}
?>