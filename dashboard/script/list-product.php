<?php
include "connect.php";

// consultar la categoria
$queryCategory = $mysqli->query("SELECT * FROM category");

$first = true;

// recorrerrer la categoria
while ($categoria = $queryCategory->fetch_assoc()) {
    
    // variable para activar al primero de la lista (esto sirve para el menu de categorias)
    $class = $first ? 'show active' : '';

    echo "
        <div class='tab-pane fade $class' id='pills-" . $categoria['categoryProducts'] . "' role='tabpanel' aria-labelledby='pills-" . $categoria['categoryProducts'] . "-tab'>
    
        <div class='product_item_wrp'>";
    
    // Consulta para productos
    $queryProduct = $mysqli->query("SELECT * FROM products WHERE category = '" . $categoria['categoryProducts'] . "'");

    // Recorre la consulta de productos
    while ($resultado = $queryProduct->fetch_assoc()) {
        
        // Quita los espacios
        $title = preg_replace('/\s+/', '', $resultado['titleHTML']);

        echo "
        <div class='pd_item_blk'>
            <a href='" . $title . ".php'>
                <i>
                    <img src='assets/img/products/" . $resultado['nameFolder'] . "/" . $resultado['imageItem'] . "' alt=''>
                </i>
                <h5>" . $resultado['nameProduct'] . "</h5>
                <p>" . $resultado['descriptionItem'] . " </p>
            </a>
        </div>";
    }

    echo "
        </div>
    </div>";
    
    // variable que indica un valor Falso para que no active a las demas categoria
    $first = false;
}
?>
