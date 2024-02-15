<?php

// conexion con la base de datos
include "connect.php"; 

// verifica si no esta nullo $_POST[subir]
if (isset($_POST['subir'])) {

   // se recive los inputs del formulario en variables
   $keyWords = $_POST['keyWords'];
   $titleHtml = $_POST['titleHtml'];
   $titleMeta = $_POST['titleMeta'];
   $descriptionMeta = $_POST['descriptionMeta'];
   $descriptionItem = $_POST['descriptionItem'];
   $descriptionProduct = $_POST['descriptionProduct'];
   $nameProduct = $_POST['nameProduct'];
   $category = $_POST['category'];
   $workshop = $_POST['workshop'];
   $material = $_POST['material'];
   $dimensions = $_POST['dimensions'];
   
   // Obtener el nombre temporal y el nombre original de la imagen de Meta
   $imageMeta = $_FILES['imageMeta']['tmp_name'];
   $imageMeta_name = $_FILES['imageMeta']['name'];

   $nameFolder = $_POST['nameFolder'];

   // Obtener el nombre temporal y el nombre original de la imagen de Item
   $imageItem = $_FILES['imageItem']['tmp_name'];
   $imageItem_name = $_FILES['imageItem']['name'];

   // Obtener el nombre temporal de la imagen de Producto
   $imagesProduct = $_FILES['imagesProduct']['tmp_name'];
   
   // verifica si el cheboox esta activo asigna 1 de lo contrario 0
   $valorBooleano = isset($_POST['mi_checkbox']) ? 1 : 0;

   //crea la carpeta para el producto
   $nameFolder = preg_replace('/\s+/', '', $nameFolder);
   if (!file_exists('../../assets/img/products/'.$nameFolder)) {
        mkdir('../../assets/img/products/'.$nameFolder, 0777, true);
        
        //genera un nuevo nombre de imagen para meta e item con respectiva extenciones
        $newNameMeta = "img-meta.".pathinfo($imageMeta_name, PATHINFO_EXTENSION);
        $newNameItem = "img-item.".pathinfo($imageItem_name, PATHINFO_EXTENSION);
        
        // se mueve la imagen a la carpeta de product
        move_uploaded_file($imageMeta, "../../assets/img/products/".$nameFolder."/".$newNameMeta);
        move_uploaded_file($imageItem, "../../assets/img/products/".$nameFolder."/".$newNameItem);

        $listNameImg = [];
        
        //recorre las imagenes multiples
           
            foreach ($_FILES['imagesProduct']['tmp_name'] as $key => $tmp_name){

                $nameImg = $_FILES['imagesProduct']['name'][$key];
                $path_tmp = $_FILES['imagesProduct']['tmp_name'][$key];
                $newName = "img-product-".$key.".".pathinfo($nameImg, PATHINFO_EXTENSION);

                move_uploaded_file($path_tmp, "../../assets/img/products/".$nameFolder."/".$newName);
                $listNameImg[]= $newName;

            }

            //convertir a cadena
            $cadenaListImg = implode(',', $listNameImg);  
            
            // crea productos nuevos
            $sql = "INSERT INTO products (keyWords, titleHTML, titleMeta, descriptionMeta, imageMeta, nameFolder, imageItem, imagesProduct, nameProduct, descriptionItem, descriptionProduct, outstand, category, workshop, material, dimensions) 
                   VALUES ('$keyWords', '$titleHtml', '$titleMeta', '$descriptionMeta', '$newNameMeta', '$nameFolder', '$newNameItem', '$cadenaListImg', '$nameProduct', '$descriptionItem', '$descriptionProduct', '$valorBooleano', '$category', '$workshop', '$material', '$dimensions')";

            $result = mysqli_query($mysqli, $sql);

           //verifica si resultado es verdadero
           if ($result) {

                $listStyleImages = [];
                
                //se convierte a cadena con el estilo las imagnes para el slider
                foreach ($listNameImg as $nameImg) {

                    $temCadena = "
                 <div class= 'pd_slider_item swiper-slide '>
                        <i>
                        <img src='assets/img/products/".$nameFolder."/".$nameImg."' alt=''>
                     </i>
                 </div>";

                    $listStyleImages[] = $temCadena;

                }

                $cadenaStyleImages = implode(' ', $listStyleImages);
                
                //genera hoja html
                $plantilla = file_get_contents('../../template/product_sub.php');
                $plantilla = str_replace(
                    ['<?= $nameProduct ?>','<?= $descriptionProduct ?>','<?= $cadenaStyleImages ?>','<?= $material ?>','<?= $dimensions ?>','<?= $title ?>','<?= $titleMeta ?>','<?= $descriptionMeta ?>','<?= $keyWords ?>','<?= $newNameMeta ?>','<?= $nameFolder ?>'], 
                    [$nameProduct,$descriptionProduct,$cadenaStyleImages,$material,$dimensions,$titleHtml,$titleMeta,$descriptionMeta,$keyWords,$newNameMeta,$nameFolder], 
                    $plantilla);

                $rutaCarpeta = '../../';

                $title = preg_replace('/\s+/', '', $titleHtml);

                $nuevoArchivo =$rutaCarpeta. $title.'.php';
                
                file_put_contents($nuevoArchivo, $plantilla);
                
                header("Location: ../pages-product.php");
                die();
                
           }

       }
}








