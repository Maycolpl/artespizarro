<?php
include "connect.php";

$id = $_GET['Id'];

//consulta que servira para eliminar la hoja php y la carpeta de imagenes
$query = $mysqli->query("SELECT titleHTML, nameFolder FROM projects WHERE projectID = $id");
$resultData = mysqli_fetch_assoc($query);

// se define la ruta y verifica la existencia de la carpeta, si es verdadero sera eliminado
$rutaArchivo = "../../assets/img/projects/".$resultData['nameFolder'];
if(is_dir($rutaArchivo)){
    eliminarCarpetaYContenido($rutaArchivo);
}

$title = preg_replace('/\s+/', '', $resultData['titleHTML']);
// se define  la ruta y verifica la existenci de la hoja php, si es verdadero sera eliminado
$rutaHTML = '../../'.$title.'.php';
if(file_exists($rutaHTML)){
    unlink($rutaHTML);
}

// elimina los datos de la base de datos
$sql = "DELETE FROM projects WHERE projectID = $id";
mysqli_query($mysqli, $sql);


// Función para eliminar una carpeta y su contenido
function eliminarCarpetaYContenido($carpeta) {
    $archivos = glob($carpeta . '/*');
    
    // recorre el contenido y va eliminando
    foreach ($archivos as $archivo) {
        is_dir($archivo) ? eliminarCarpetaYContenido($archivo) : unlink($archivo);
    }
    // elimina la carpeta
    rmdir($carpeta);
}
header("Location: ../pages-list-project.php");
die();
