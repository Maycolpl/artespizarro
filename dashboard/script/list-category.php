<?php
include "connect.php";

// consulta para traer todo de categoria
$query = $mysqli->query("SELECT * FROM category");

$first = true; 

// recorre la consulta y al primero de la lista lo activa
while ($resultado = $query->fetch_assoc()) {
    $categoryProducts = $resultado['categoryProducts'];

    // actibva al primero de la lista
    $activeClass = $first ? 'active' : '';

    echo "
        <li class='nav-item' role='presentation'>
            <button class='nav-link $activeClass' id='pills-$categoryProducts-tab' data-bs-toggle='pill' 
                data-bs-target='#pills-$categoryProducts'
                type='button' role='tab' aria-controls='pills-$categoryProducts' aria-selected='false'>
                $categoryProducts
            </button>
        </li>
    ";

    $first = false;
}
?>
