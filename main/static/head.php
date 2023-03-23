<?php
    session_start();
    ob_start();
    
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALLEDROGO</title>
    <link rel="stylesheet" href="../styles/main.css"/>
    <link rel="stylesheet" href="../styles/home.css"/>
    <link rel="stylesheet" href="../styles/account.css"/>
    <link rel="stylesheet" href="../styles/auth.css"/>
    <link rel="stylesheet" href="../styles/auctions.css"/>
    <link rel="stylesheet" href="../styles/addauction.css"/>
    <link rel="stylesheet" href="../styles/product.css"/>
    
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>

</head>