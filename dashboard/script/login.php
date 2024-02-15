<?php
    //Includes
    include "connect.php";

    //Variables
    $userName = $_POST["username"];
    $pass = $_POST["password"];


    //Sentences
    $query = "select * from user where nameUser = '".$userName."' and userPassword = '".$pass."';";
    $result = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_array($result);
        $mysqli->close();

        session_start();//Start session for save the variable session "user-loged"
        $_SESSION["user-loged"] = $row;   
        $_SESSION['usuario']=$userName;

        header("location: ../index.php");
    }
    else
    {
        header("location: ../pages-login.php");
    }
?>