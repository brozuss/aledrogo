<?php
include('../phpconfig/connect.php');
    if(isset($_REQUEST['bidprice'])){
        $bid_id=$_GET['product'];
        $selbid=mysqli_query($connect, 'SELECT * FROM `licytacje` WHERE przedmiot_id="'.$_GET['product'].'" limit 1;');
        while($row = mysqli_fetch_array($selbid)){
            $actualprice=$row['cena_podbicie']+10;
            $bid_id=$row['id'];
        }
        $proposed_price=$_REQUEST['bidprice'];
        if($proposed_price<$actualprice){
            echo 'Aby licytować musisz podać cenę wyższą od aktualnej!';
        }else{
            $set_new_price=$connect->prepare("UPDATE `licytacje` SET `uzytkownik_id` = '".$_SESSION['user']."', `cena_podbicie` = '".$proposed_price."' WHERE `licytacje`.`id` = '".$bid_id."';
            ");
            $set_new_price->execute();
            header("refresh: 0.01 ");
        }
        
    }
?>