<?php
include "connect.php";

$id = $_GET['Id'];

//consulta que servira para eliminar la hoja php y la carpeta de imagenes
$query = $mysqli->query("SELECT titleHTML, nameFolder FROM products WHERE productID = $id");
$resultData = mysqli_fetch_assoc($query);


// se define la ruta y verifica la existencia de la carpeta, si es verdadero sera eliminado
$rutaArchivo = "../../assets/img/products/".$resultData['nameFolder'];
if(is_dir($rutaArchivo)){
    eliminar($rutaArchivo);
}

$title = preg_replace('/\s+/', '', $resultData['titleHTML']);
// se define  la ruta y verifica la existenci de la hoja php, si es verdadero sera eliminado
$rutaHTML = '../../'.$title.'.php';
if(file_exists($rutaHTML)){
    unlink($rutaHTML);
}

// elimina los datos de la base de datos
$sql = "DELETE FROM products WHERE productID = $id";
mysqli_query($mysqli, $sql);

// Función para eliminar una carpeta y su contenido
function eliminar($carpeta) {
    $archivos = glob($carpeta . '/*');
    
    // recorre el contenido y va eliminando
    foreach ($archivos as $archivo) {
        is_dir($archivo) ? eliminar($archivo) : unlink($archivo);
    }
    
    // elimina la carpeta
    rmdir($carpeta);

    
}

header("Location: ../pages-list-product.php");
die();
