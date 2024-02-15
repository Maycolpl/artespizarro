<?php
include "connect.php";


// lista todo los producto en una tabla
$query = $mysqli->query("SELECT * FROM products");

while ($resultado = $query->fetch_assoc()) {
    echo "
    
    <tr>
                
         <td>".$resultado['nameProduct']."</td>
        <td>".$resultado['category']."</td>
        <td>".$resultado['material']."8</td>
        <td>".$resultado['dimensions']."</td>
        <td>
        
          <a href='pages-edit-product.php?Id=$resultado[productID]' class='btn btn-primary' ><i class='bi bi-pencil-fill'></i></a>
          <a href='script/delete-product.php?Id=$resultado[productID]' class='btn btn-danger' ><i class='bi bi-trash3-fill'></i></a>
        </td>

    </tr>
    ";
}