<!-- head & navbar -->
<?php
include('static/head.php');
include('static/navbar.php');

?>
<!-- main add auction -->
<nav class="ogloszenia">
    <div><h1><span>Dodaj</span> ogłoszenie</h1></div>
</nav>
<div class="container"> 
    <form action="addauction.php" method="post">
        <div class="form_addauction">
            
            <!-- Tytuł ogłoszenia -->
            <div class="inputarea">    
                <label for="title">Tytuł ogłoszenia:</label>
                    <input type="text" name="tytul" id="title">
            </div>
                <!-- Kategoria -->
                <div class="inputarea">    
                <label for="category">Kategoria:</label>
                    <select name="kategoria" id="category">
                        <!-- insert options from db  -->
                        <option value=0>---</option>
                        <option value=1>Komputery</option>
                        <option value=2>Elektronika</option>
                        <option value=3>Motoryzacja</option>
                    </select>
            </div>
            <!-- Cena -->
            <div class="inputarea">    
                <label for="price">Cena:</label>
                    <input type="number" name="cena" id="price">  
            </div>
            <!-- Opis -->
            <div class="inputarea">    
                <label for="description">Opis:</label>
                    <input type="text" name="opis" id="description">  
            </div>
            <!-- dodawanie zdjjecia -->
            <div class="inputarea">    
                    <input type="file" name="file" id="file">  
            </div>
            <input type="submit" class="additem" value="DODAJ">
            <!-- PHP CONFIG -->
            <?php
                include('../phpconfig/addauctions.php');
            ?>
            
        </div>
    </form>
</div>
<section></section>
<!-- footer -->
<?php
include('static/footer.php');
?>