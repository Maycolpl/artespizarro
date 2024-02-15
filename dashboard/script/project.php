<?php
include "connect.php";


// lista todo los projectos en una tabla
$query = $mysqli->query("SELECT * FROM projects");

while ($resultado = $query->fetch_assoc()) {
    echo "
    
    <tr>
                
         <td>".$resultado['nameProject']."</td>
        <td>".$resultado['descriptionProject']."</td>
       
        <td>
        
          <a href='pages-edit-project.php?Id=$resultado[projectID]' class='btn btn-primary' ><i class='bi bi-pencil-fill'></i></a>
          <a href='script/delete-project.php?Id=$resultado[projectID]' class='btn btn-danger' ><i class='bi bi-trash3-fill'></i></a>
        </td>

    </tr>
    ";
}