<?php
include "connect.php";


// verifica si existe el id para poder actualizar
if (isset($_GET['Id'])) {

    $id = $_GET['Id'];

    // busca el producto para usar en el formulario de editar para luego ser editado
    $query = $mysqli->query("SELECT * FROM category WHERE categoryID  = $id");
    $resultData = mysqli_fetch_assoc($query);
      
    // cambia el input cuando se usa el boton editar
    $input = "<input type='text' class='form-control' name='categoryProducts' value='".$resultData['categoryProducts']."' required>
               <input type='hidden' class='form-control' name='id' value='".$id."' required>  
            ";
    $typeButton = 'update';
    $action = 'script/edit-category.php';

}else{

    // cundo no se ha enviado nigun id
    $input =  "<input type='text' class='form-control' name='categoryProducts' required>";
    $typeButton = 'subir';
    $action = 'script/add-category.php';
}



