<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- main index -->
<section class="container-all-products">

    <a href='product.php' class='link'><div class='container-product'>
        <img src='zdjecia/$img_name'>
        <div class="container_wo_img">  
            <div class='title_description'>
                <div class='title'> <h3>$nazwa</h3> </div>
                <div class='description'> <p>$opis</p> </div>
            </div>
            <div class='price_endauction'>
                <div class='price'>
                <p>$cena_podbicie zł</p>
                </div>
                <div class='endauctionin'>
                <p>Koniec aukcji za:</p>
                <p>$czaszakoncz dni</p>
                </div>
            </div>
        </div>
        </div></a>  

    <a href='product.php' class='link'><div class='container-product'>
        <div class="grid_img">
            <img src='zdjecia/$img_name'>
        </div>
        <div class="grid_tytul">
            $nazwa
        </div>
        <div class="grid_opis">
            $opis
        </div>
        <div class="grid_cena">
            $cena_podbicie zł
        </div>
        <div class="grid_czas">
            <p>Koniec aukcji za:</p>
            <p>$czaszakoncz dni</p>
        </div>
    </div></a>
</section>
<section></section>
<!-- footer -->
<?php
include('static/footer.php');
?>