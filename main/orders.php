<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- main orders -->

<section class="container-all-products">
    <h1>Twoje wygrane aukcje</h1>
    <?php
    include('../phpconfig/connect.php');
    // sprawdzanie czy istnieją aukcje
    $isexisauctions = $connect->prepare('SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE licytacje.zakonczona=1 and uzytkownik_id="' . $_SESSION['user'] . '" ');
    $isexisauctions->execute();
    $res_isexisauctions = $isexisauctions->get_result();
    if ($res_isexisauctions->num_rows == 0) {
        echo "
            <section class='container-all-products' id='defaultsection'>
                <div id='noproducts'>
                    <h1> Brak wygranych aukcji </h1>
                </div>    
            </section>
            <section></section>
            ";
    } else {

        // wyświetlanie aukcji
        $sel = mysqli_query($connect, 'SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE licytacje.zakonczona=1 and uzytkownik_id="' . $_SESSION['user'] . '" ');

        while ($row = mysqli_fetch_array($sel)) {
            $produkt_id = $row['id'];
            $nazwa = $row['nazwa'];
            $opis = $row['opis'];
            $img_name = $row['img_name'];
            $cena_wywolawcza = $row['cena_wywolawcza'];
            $cena_podbicie = $row['cena_podbicie'];
            $data_zakonczenia = strtotime($row['data_zakonczenia']);
            $dniodzakoncz = round((strtotime("now")- $data_zakonczenia) / 86400);
    ?>
            <a href='product.php?product=<?php echo $row['id'] ?>' class='link'>
                <div class='container-product'>
                    <div class='grid_img'>
                        <img src='zdjecia/<?php echo $img_name ?>'>
                    </div>
                    <div class='grid_tytul'>
                        <?php echo $nazwa ?>
                    </div>
                    <div class='grid_opis'>
                        <?php echo $opis ?>
                    </div>
                    <div class='grid_cena'>
                        Cena początkowa:<br>
                        <?php echo $cena_wywolawcza ?> zł<br><br>
                        Cena końcowa:<br>
                        <?php echo $cena_podbicie ?> zł
                    </div>
                    <div class='grid_czas'>
                        <p>Aukcja zakończyła się:</p>
                        <p><?php echo $dniodzakoncz ?> dni temu</p>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    ?>
<section></section>

</section>

<!-- footer -->
<?php
include('static/footer.php');
?>