<?php
    //DB Data
    $server = "localhost";
    $userDB = "maycol";
    $passDB = "YaritZapilo-123";
    $nameDB = "artespizarro";

    //Connection
    $mysqli = new mysqli($server, $userDB, $passDB, $nameDB);

    if ($mysqli->connect_error) 
    {
        header('location: ../pages-error-500.php');
    }
?>