<?php
// 
// rejestracja
// 
if(isset($_REQUEST['imie']) && isset($_REQUEST['nazwisko']) && isset($_REQUEST['email']) && isset($_REQUEST['haslo'])){
    include('../phpconfig/connect.php');    //database connect

    $imie=$_REQUEST['imie'];
    $nazwisko=$_REQUEST['nazwisko'];
    $email=$_REQUEST['email'];
    $haslo=$_REQUEST['haslo'];
    
    // email filter
    $email=filter_var($email,FILTER_SANITIZE_EMAIL);
    $checkemail=$connect->prepare("SELECT * FROM uzytkownicy WHERE email=? LIMIT 1");
    $checkemail->bind_param("s", $email);
    $checkemail->execute();
    $res_email=$checkemail->get_result();

    // rejestrowanie użytkownika
    $add_user=$connect->prepare("INSERT INTO `uzytkownicy` VALUES(NULL, ?, ?, ?, ?)");
    $haslo_hash=password_hash($haslo,PASSWORD_ARGON2I);
    $add_user->bind_param("ssss",$imie, $nazwisko, $email,$haslo_hash);
    $add_user->execute();

}

// 
// logowanie
// 
if(isset($_REQUEST['email']) && isset($_REQUEST['haslo'])){
    include('../phpconfig/connect.php');    //database connect

    $email=$_REQUEST['email'];
    $haslo=$_REQUEST['haslo'];

    // email filter
    $email=filter_var($email,FILTER_SANITIZE_EMAIL);
    $checkemail=$connect->prepare("SELECT * FROM uzytkownicy WHERE email=? LIMIT 1");
    $checkemail->bind_param("s", $email);
    $checkemail->execute();
    $res_email=$checkemail->get_result();

    $userrow=$res_email->fetch_assoc();

    if($userrow==NULL){
        // brak lub złe dane użytkownika
        echo "<div><br><br></div><div style='color: red; font-weight: bold;' >
        Coś poszło nie tak. Spróbuj wpisać swoje dane ponownie.
        </div><div><br><br></div>";   
    }else{
        // prawidłowe
        if(password_verify($haslo, $userrow['haslo'])){
            // haslo poprawne
            $id_uzytkownika=$connect->prepare("SELECT id FROM uzytkownicy WHERE email='$email'");
            $id_uzytkownika->execute();
            $res_id_uzytkownika = $id_uzytkownika->get_result();
            if($res_id_uzytkownika->num_rows == 1)
            {
                $res_id_uzytkownika = $res_id_uzytkownika->fetch_array();
                $_SESSION['user']=$res_id_uzytkownika['id'];
            }

            
            
            header('Location:http://localhost/aledrogo/main/home.php');
        }else{
            // haslo niepoprawne
            echo "<div style='color: red;' >
            <br>Coś poszło nie tak. Spróbuj wpisać swoje dane ponownie.
            </div>";   
        }
    }
}
?>