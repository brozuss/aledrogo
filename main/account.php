<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');
?>
<!-- main account -->

<div class="container">
<!-- SIDE MENU -->
<nav class="side-menu">
    <div class="side-menu-items">
        <a href="account.php">twoje konto</a> 
    </div>
    <div class="side-menu-items">
        <a href="auctions.php">twoje ogłoszenia</a> 
    </div>
    <div class="side-menu-items">
        <a href="orders.php">twoje zamówienia</a> 
    </div>
</nav>

<!-- MAIN CONTENT -->
<main class="account-main">
    <div class="h">
        <h1>Twoje konto, <span><?php include("../phpconfig/echonameaccount.php"); ?></span></h1>
        <p>na Twoim profilu <span>Alledrogo</span>, gdzie możesz zarządzać swoimi zamówieniami, zwrotami oraz ustawieniami konta.</p>
        
    </div>
    
</main>

</div>

<!-- footer -->
<?php
include('static/footer.php');
?>