<?php
    session_start();
    if (!isset($_SESSION['user-loged']))
    {
        header("location: pages-login.php");//Send the this page 
    }
?>