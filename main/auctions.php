<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');

?>
<!-- main auctions -->
<nav class="ogloszenia">
    <div><h1><span>Twoje</span> ogłoszenia</h1></div>
    <a class="dodajogloszenie" href="../main/addauction.php"><h1> Dodaj ogłoszenie</h1></a>
</nav>
<div class="container">
    <?php
        include('../phpconfig/auctionsconfig.php');
    ?> 
        
</div>
<section></section>
<!-- footer -->
<?php
include('static/footer.php');
?>