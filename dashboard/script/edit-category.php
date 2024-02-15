<<?php
include "connect.php"; 

// verifica si no esta vacia $_POST['update'] => corresponde al boton submit
if (isset($_POST['update'])) {
     
    // recupera datos del formulario
    $categoryProducts = $_POST['categoryProducts'];
    $id = $_POST['id'];
     
    // actualiza los datos
    $sql = "UPDATE category SET categoryProducts = '$categoryProducts' WHERE categoryID = '$id'";
    mysqli_query($mysqli, $sql);
    
    //regresa a la lista
    header("Location: ../pages-category.php");
    die();
}

