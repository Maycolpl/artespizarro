<?php
    session_start();
    if(isset($_SESSION['user-loged']))
        header("location: index.php");
?>