<?php
include "connect.php";

//lista de estilos para dar forma de galeria a proyectos
$listStyle = array(
    array("col-lg-7 col-md-7", "proto_blk hight_m"),
    array("col-lg-5 col-md-5", "proto_blk hight_m"),
    array("col-lg-4 col-md-4", "proto_blk hight_s"),
    array("col-lg-8 col-md-8", "proto_blk hight_s"),
    array("col-lg-12", "proto_blk hight_L"),
);

$query = $mysqli->query("SELECT * FROM projects");

// Inicializar el contador
$counter = 0;

// recorrido de los projectos para listar
while ($resultado = $query->fetch_assoc()) {
    // Obtener las clases actuales
    $style1 = $listStyle[$counter][0];
    $style2 = $listStyle[$counter][1];

    // Eliminar los espacios
    $title = preg_replace('/\s+/', '', $resultado['titleHTML']);
   
    echo "
        <div class='$style1'>
            <div class='$style2'>
                <a href='" . $title . ".php'>
                    <i>
                        <img src='assets/img/projects/" . $resultado['nameFolder'] . "/" . $resultado['imageItem'] . "' alt=''>
                    </i>
                    <p>" . $resultado['nameProject'] . "
                        <span>Piedra de Huamanga (Alabastro)</span>
                    </p>
                </a>
            </div>
        </div>
    ";

    // Incrementar el contador y volver al principio si llegamos al final del array
    $counter = ($counter + 1) % count($listStyle);
}
?>
