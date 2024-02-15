<?php
include "connect.php";

// lista en la tabla del dashboard categorias
// con botones de eliminar y editar
$query = $mysqli->query("SELECT * FROM category");

while ($resultado = $query->fetch_assoc()) {
    echo "
    
    <tr>
                
         <td>".$resultado['categoryProducts']."</td>
        <td>
        
          <a href='pages-category.php?Id=$resultado[categoryID]' class='btn btn-primary' ><i class='bi bi-pencil-fill'></i></a>
          <a href='script/delete-category.php?Id=$resultado[categoryID]' class='btn btn-danger' ><i class='bi bi-trash3-fill'></i></a>
        </td>

    </tr>
    ";
}