<?php
include "connect.php";

$id = $_GET['Id'];

// busca el producto para usar en el formulario de editar para luego ser editado
$query = $mysqli->query("SELECT * FROM products WHERE productID = $id");
$resultData = mysqli_fetch_assoc($query);