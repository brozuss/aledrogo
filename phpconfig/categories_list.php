<?php
    include("../phpconfig/connect.php");
        $categories=mysqli_query($connect, "SELECT * from kategorie ORDER BY nazwa ASC");
        while($row=mysqli_fetch_array($categories)){
            $id_categories=$row['id'];
            $name_categories=$row['nazwa'];
            echo"
            <option value='$id_categories'>$name_categories</option>
            ";
    }
?>