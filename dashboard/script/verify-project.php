<?php
include "connect.php";

$id = $_GET['Id'];

// busca el projecto para usar en el formulario de editar para luego ser editado
$query = $mysqli->query("SELECT * FROM projects WHERE projectID = $id");
$resultData = mysqli_fetch_assoc($query);