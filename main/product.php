<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- main index -->
<section class='container_product_details' id="defaultsection">
    <?php
    include('../phpconfig/connect.php');
    $sel = mysqli_query($connect, 'SELECT przedmioty.*, licytacje.*, uzytkownicy.*  FROM `przedmioty` 
    JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id
    JOIN uzytkownicy ON uzytkownicy.id=przedmioty.sprzedajacy_id
     WHERE przedmioty.id="' . $_GET['product'] . '" limit 1;');
    while ($row = mysqli_fetch_array($sel)) {
        $sprzedajacy_id = $row['sprzedajacy_id'];
        $produkt_id = $row['id'];
        $imie_sprzedawcy = $row['imie'];
        $nazwisko_sprzedawcy = $row['nazwisko'];
        $email = $row['email'];
        $nazwa = $row['nazwa'];
        $opis = $row['opis'];
        $img_name = $row['img_name'];
        $cena_wywolawcza = $row['cena_wywolawcza'];
        $cena_podbicie = $row['cena_podbicie'];
        $data_wystawienia = strtotime($row['data_wystawienia']);
        $data_zakonczenia = strtotime($row['data_zakonczenia']);
        $czaszakoncz = round(($data_zakonczenia - strtotime("now")) / 86400);
    ?>
        <!-- panel zdjecie aukcji -->
        <div class="product_img">
            <div class="img">
                <img src='zdjecia/<?php echo $img_name ?>'>
            </div>
        </div>
        <!-- panel tytulowy -->
        <div class='product_title'>
            <h1><?php echo $nazwa ?></hi>
        </div>
        <!-- panel licytacji -->
        <div class="product_bid">
            <div class="seller_contact">
                <h2>Sprzedawca:</h2>
                <p><?php echo '<span>' . $imie_sprzedawcy . '</span>' . ' ' . $nazwisko_sprzedawcy ?></p>

                <a href="mailto:<?php echo $email ?>" class="link">
                    <button>WYŚLIJ WIADOMOŚĆ</button>
                </a>
            </div>
            <div class="product_bidprice">
                <div class="bidprice_price">
                    <p>Aktualna oferta:</p>
                    <h2><?php echo $cena_podbicie ?> zł</h2>
                </div>                    
                <div class="bidprice_bid">

                <?php
                if(isset($_SESSION['user'])){
                
                if ($_SESSION['user'] == $sprzedajacy_id) {
                    echo '<h2>Zarządzanie aukcją</h2>';
                } elseif ($_SESSION['user'] !== $sprzedajacy_id) { ?>
                        <form action="product.php?product=<?php echo $_GET['product'] ?>" method="post">
                            <div class="bidrow">
                                <div class="inputarea">
                                    <input type="number" placeholder="<?php echo $cena_podbicie + 10 ?> zł lub więcej" name="bidprice">
                                </div>
                                <div class="inputarea">
                                    <input type="submit" value="Licytuj!" class="btnlicytuj">
                                </div>
                            </div>
                        </form>
                        <!-- bid auction script -->
                        <?php
                        include('../phpconfig/bids.php');
                        ?>
                    
                <?php }} else {
                    echo 'Aby licytować aukcję zaloguj się!';
                    echo "<a href='auth.php' class='link'><div id='product_login'><button class='btnlicytuj'> ZALOGUJ SIĘ!</button></div></a>";
                }
                mysqli_close($connect); ?>
                </div>
                <div class="bidprice_existtime">
                    Aukcja zakończy się za <?php echo $czaszakoncz ?>dni
                </div>
            </div>

        </div>
        <!-- panel z opisem -->
        <div class='product_description'>
            <h3>OPIS</h3>
            <?php echo $opis ?>
        </div>
        <!-- panel z proponowanymi przedmiotami -->
        <div class='products_proposed'>
            <h3>SPRAWDŹ RÓWNIEŻ</h3>
            <?php include('../phpconfig/connect.php');
            $sel = mysqli_query($connect, "SELECT *, licytacje.cena_podbicie FROM `przedmioty` JOIN licytacje ON licytacje.przedmiot_id=przedmioty.id WHERE przedmioty.id !='".$_GET['product']."' and przedmioty.data_zakonczenia>CURRENT_DATE ORDER BY rand() limit 3");

            while ($row = mysqli_fetch_array($sel)) {
                $produkt_id = $row['id'];
                $nazwa = $row['nazwa'];
                $img_name = $row['img_name'];
                $cena_podbicie = $row['cena_podbicie'];
            
            ?>
                <a href='product.php?product=<?php echo $row["id"] ?>' class='link'>
                    <div class="product">
                        <div class="img">
                            <img src='zdjecia/<?php echo $img_name ?>'>
                        </div>
                        <div class="title">
                            <h4><?php echo $nazwa ?></h4>
                        </div>
                        <div class="price">
                            <?php echo $cena_podbicie ?> zł
                        </div>
                    </div>
                </a>
            <?php 
            } ?>
        </div>

    <?php
    }
    ?>
</section>
<section></section>
<!-- footer -->
<?php
include('static/footer.php');
?>