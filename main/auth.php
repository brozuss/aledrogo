<?php
// head & navbar 
include('static/head.php');
include('static/navbar.php');


?>

<div class="container">

<!-- main login -->
<section class="logreg">
<h1><span>Witaj</span> ponownie!</h1><br><br>
<form action="auth.php" method="post">
    <div class="form">
            <!-- email -->
        <div class="inputarea">
            <label for="logemail">E-mail</label>
                <input type="text" name="email" id="logemail">
        </div>
            <!-- haslo -->
        <div class="inputarea">    
            <label for="loghaslo">Hasło</label>
                <input type="password" name="haslo" id="loghaslo">  
        </div>
        
        <input type="submit" class="btnlogreg" value="ZALOGUJ">
    </div>
    <!-- PHP CONFIG -->
    <?php
        include('../phpconfig/logreg.php');
    ?>
</form>
</section>

<section class="logreg">
<!-- main register -->
<h1><span>Jestem</span> tu pierwszy raz</h1><br><br>
<form action="auth.php" method="post">
    <div class="form">
            <!-- email -->
        <div class="inputarea">
            <label for="regimie">Imię</label>
                <input type="text" name="imie" id="regimie">
        </div>
            <!-- haslo -->
        <div class="inputarea">    
            <label for="regnazwisko">Nazwisko</label>
                <input type="TEXT" name="nazwisko" id="regnazwisko">
        </div>
            <!-- email -->
        <div class="inputarea">    
            <label for="regemail">E-mail</label>
                <input type="text" name="email" id="regemail">
        </div>
            <!-- haslo -->
        <div class="inputarea">    
            <label for="reghaslo">Hasło</label>
                <input type="password" name="haslo" id="reghaslo">
        </div>    
        
        <input type="submit" class="btnlogreg" value="ZAREJESTRUJ">
    </div>
</form>

</section>

</div>
<section></section>
<!-- footer -->
<?php
include('static/footer.php');
?>