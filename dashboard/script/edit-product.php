<?php

// conexion con la base de datos
include "connect.php";

// verifica si no esta nullo $_POST[update]
if (isset($_POST['update'])) {
    
    // se recive los inputs del formulario en variables
    $id = $_POST['id'];
    $keyWords = $_POST['keyWords'];
    $titleHtml = $_POST['titleHtml'];
    $titleMeta = $_POST['titleMeta'];
    $descriptionMeta = $_POST['descriptionMeta'];
    $nameProduct = $_POST['nameProduct'];
    $descriptionItem = $_POST['descriptionItem'];
    $descriptionProduct = $_POST['descriptionProduct'];
    $workshop = $_POST['workshop'];
    $material = $_POST['material'];
    $dimensions = $_POST['dimensions'];

    // consulta de un producto
    $query = $mysqli->query("SELECT * FROM products WHERE productID = $id");
    $resultData = mysqli_fetch_assoc($query);

    // verifica si el cheboox esta activo asigna 1 de lo contrario 0
    $valorBooleano = isset($_POST['mi_checkbox']) ? 1 : 0;

    // verifica si categoria no este vasia

    $category = !empty($_POST['category']) ? $_POST['category'] : $resultData['category'];

    // verifica si el nombre es igual que en la base de datos (nameFolder)
    $folder = preg_replace('/\s+/', '', $_POST['nameFolder']);
    if ($resultData['nameFolder'] != $folder) {

        // si existe la carpeta renombra la carpeta
        if(file_exists('../../assets/img/products/'.$resultData['nameFolder'] )){
            
            $rutaOriginal = '../../assets/img/products/'.$resultData['nameFolder'];
            $rutaNuevo = '../../assets/img/products/'.$folder;
            rename($rutaOriginal, $rutaNuevo);
            $nameFolder = $folder;     
        }

    }else{
        $nameFolder = $_POST['nameFolder'];
    }


    // Verifica si se ha subido una imagen Meta
    if (!empty($_FILES['imageMeta']['tmp_name'])) {

        $imageMeta = $_FILES['imageMeta']['tmp_name'];
        $imageMeta_name = $_FILES['imageMeta']['name'];
        
        $rutaImagenMeta = '../../assets/img/products/'.$nameFolder.'/'.$resultData['imageMeta'];


        if (file_exists($rutaImagenMeta)) {
            unlink($rutaImagenMeta);
        }

        $newNameMeta = "img-meta.".pathinfo($imageMeta_name, PATHINFO_EXTENSION);
        move_uploaded_file($imageMeta, "../../assets/img/products/".$nameFolder."/".$newNameMeta);

    }else{
        $newNameMeta = $resultData['imageMeta'];
    }

    // Verifica si se ha subido una imagen Item
    if (!empty($_FILES['imageItem']['tmp_name'])) {

        $imageItem = $_FILES['imageItem']['tmp_name'];
        $imageItem_name = $_FILES['imageItem']['name'];

        $rutaImagenItem = '../../assets/img/products/'.$nameFolder.'/'.$resultData['imageItem'];

        if (file_exists($rutaImagenItem)) {
            unlink($rutaImagenItem);
        }

        $newNameItem = "img-item.".pathinfo($imageItem_name, PATHINFO_EXTENSION);
        move_uploaded_file($imageItem, "../../assets/img/products/".$nameFolder."/".$newNameItem);
    }else{
        $newNameItem = $resultData['imageItem'];
    }


    // Verifica si se ha subido imagenes del producto
    if (!empty($_FILES['imagesProduct']['name'][0]))  {
        // Obtener las imágenes existentes
        $strImagesProduct = $resultData['imagesProduct'];
        $ListImagesProduct = explode(',', $strImagesProduct);
    
        // Eliminar las imágenes existentes
        foreach ($ListImagesProduct as $imageProduct) {
            $rutaImagenProduct = '../../assets/img/products/'.$nameFolder.'/'.$imageProduct;
            if (file_exists($rutaImagenProduct)) {
                unlink($rutaImagenProduct);
            }
        }
    
        // Inicializar lista de nombres de imágenes
        $listNameImg = [];
    
        // Recorrer las imágenes múltiples
        foreach ($_FILES['imagesProduct']['tmp_name'] as $key => $tmp_name) {
            // Obtener información del archivo
            $nameImg = $_FILES['imagesProduct']['name'][$key];
            $path_tmp = $_FILES['imagesProduct']['tmp_name'][$key];

            $newName = "img-product-".$key.".".pathinfo($nameImg, PATHINFO_EXTENSION);
    
            // Mover el archivo a la nueva ubicación
            move_uploaded_file($path_tmp, "../../assets/img/products/".$nameFolder."/".$newName);
    
            // Agregar el nuevo nombre a la lista
            $listNameImg[] = $newName;
        }
    
        // Convertir la lista a cadena
        $cadenaListImg = implode(',', $listNameImg);

    } else {
        // Si no hay nuevas imágenes, conservar las existentes
        // Obtener las imágenes existentes
        $cadenaListImg = $resultData['imagesProduct'];
        $listNameImg = explode(',', $cadenaListImg);
    }
    

    // Actualiza en la base de datos
    $sql = "UPDATE products SET keyWords = '$keyWords', titleHTML = '$titleHtml', titleMeta = '$titleMeta', 
        descriptionMeta = '$descriptionMeta', imageMeta = '$newNameMeta', nameFolder = '$nameFolder', 
        imageItem = '$newNameItem', imagesProduct = '$cadenaListImg', nameProduct = '$nameProduct', 
        descriptionItem = '$descriptionItem', descriptionProduct = '$descriptionProduct', 
        outstand = '$valorBooleano', category = '$category', workshop = '$workshop', 
        material = '$material', dimensions = '$dimensions' WHERE productID = '$id'";


    $result = mysqli_query($mysqli, $sql);


    
    //verifica si resultado es verdadero
    if ($result) {

        $title = preg_replace('/\s+/', '', $resultData['titleHTML']);

        $rutaHTML = '../../'.$title.'.php';
            if(file_exists($rutaHTML)){
                unlink($rutaHTML);
            }

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
        
        
    }

    header("Location: ../pages-list-product.php");
    die();
   
}

