<?php
include('connect.php');
    $check=mysqli_query($connect, "SELECT przedmioty.id, przedmioty.data_zakonczenia, licytacje.zakonczona FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id");
    while($row = mysqli_fetch_array($check)){
        $id_aukcji=$row['id'];
        $datazakonczenia=$row['data_zakonczenia'];
        $datateraz=date('Y-m-d H:i:s');
        if($datazakonczenia<$datateraz){
            $updatestatus=$connect->prepare("UPDATE licytacje SET zakonczona = 1 WHERE licytacje.id=$id_aukcji;");
            $updatestatus->execute();
        }
    }
?>