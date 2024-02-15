<?php
    session_start();//Start session
    session_unset();//Delete all session variable
    session_destroy();//Delete the session info

    header("location: ../pages-login.php");//Send the this page 
?>