<?php
   include "connect.php";
   
   // para el combobox del formulario de productos
   $query = $mysqli->query("SELECT * FROM category");
   while ($resultado = $query->fetch_assoc()) {
    echo "<option value='".$resultado['categoryProducts']."'>".$resultado['categoryProducts']."</option>";
   }
  
?>