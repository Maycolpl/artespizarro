<?php

include "connect.php"; 

// si existe $_POST['subir']
// inserta nueva categoria
if (isset($_POST['subir'])) 
{
    $categoryProducts= $_POST['categoryProducts'];

    $sql = "INSERT INTO category (categoryProducts) VALUES ('$categoryProducts')";

    mysqli_query($mysqli, $sql);

    header("Location: ../pages-category.php");
    die();
}