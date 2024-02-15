<?php
include "connect.php";

if (isset($_POST['update'])) {
    
    // Recuperas los datos del formualrio
    $id = $_POST['id'];

    $keyWords = $_POST['keyWords'];
    $titleHTML = $_POST['titleHTML'];
    $titleMeta = $_POST['titleMeta'];
    $descriptionMeta = $_POST['descriptionMeta'];
    $nameProject = $_POST['nameProject'];
    $descriptionItem = $_POST['descriptionItem'];
    $descriptionProject = $_POST['descriptionProject'];

    
    // Consulta del producto
    $query = $mysqli->query("SELECT * FROM projects WHERE projectID = $id");
    $resultData = mysqli_fetch_assoc($query);
     
    // se quita los espacios para dar una validacion
    $folder = preg_replace('/\s+/', '', $_POST['nameFolder']);
    if ($resultData['nameFolder'] != $folder) {
        
        //Se verifica la existencia de la carpeta, si existe se remplaza con el nuevo
        if(file_exists('../../assets/img/projects/'.$resultData['nameFolder'] )){
            
            
            $rutaOriginal = '../../assets/img/projects/'.$resultData['nameFolder'];
            $rutaNuevo = '../../assets/img/projects/'.$folder;
            rename($rutaOriginal, $rutaNuevo);
            $nameFolder = $folder;
    
        }
    }else{
        // si no son igules se devuelve el nombre actual
        $nameFolder = $resultData['nameFolder'];
    }

    
    //verifica que no este vacia
    if (!empty($_FILES['imageMeta']['tmp_name'])) {
        
        // recupera datos del formulario
        $imageMeta = $_FILES['imageMeta']['tmp_name'];
        $imageMeta_name = $_FILES['imageMeta']['name'];
         
        // ruta actual
        $rutaImagenMeta = '../../assets/img/projects/'.$nameFolder.'/'.$resultData['imageMeta'];
       
        // si existe la ruta actual se elimina
        if (file_exists($rutaImagenMeta)) {
            unlink($rutaImagenMeta);
        }
        
        // Se mueve a la imagen a la carpeta actual
        $newNameMeta = "img-meta.".pathinfo($imageMeta_name, PATHINFO_EXTENSION);
        move_uploaded_file($imageMeta, "../../assets/img/projects/".$nameFolder."/".$newNameMeta);
     

    }else{
        // si no esta vacia se devolvera el dato del formukario
        $newNameMeta = $resultData['imageMeta'];
    
    }

    
    // verifica si no esta vacia $_FILES['imageItem']

    if (!empty($_FILES['imageItem']['tmp_name'])) {

        // se captura los datos del formulario
        $imageItem = $_FILES['imageItem']['tmp_name'];
        $imageItem_name = $_FILES['imageItem']['name'];
        
        // ruta actual de la imagen Item
        $rutaImagenItem = '../../assets/img/projects/'.$nameFolder.'/'.$resultData['imageItem'];
        
        // Si existe la ruta se elimina la imagen Item
        if (file_exists($rutaImagenItem)) {
            unlink($rutaImagenItem);
        }
        
        // Se mueve la imagen Item a la carpeta/ruta actual
        $newNameItem = "img-item.".pathinfo($imageItem_name, PATHINFO_EXTENSION);
        move_uploaded_file($imageItem, "../../assets/img/projects/".$nameFolder."/".$newNameItem);
    }else{

        // si se ha enviado un imagen se retornara la imagen
        $newNameItem = $resultData['imageItem'];

    }


    // verifica si esta vacia el array $_FILES['imagesProject']
    if (!empty($_FILES['imagesProject']['name'][0])) {
         
        // se trae las imagenes de la consulta anterior, se transforma a una lista
        // para recorrer y eliminarlos
        $strImagesProject = $resultData['imagesProject'];
        $ListImagesProject = explode(',', $strImagesProject);

        foreach ($ListImagesProject as $imageProject) {
            $rutaImagenProject = '../../assets/img/projects/'.$nameFolder.'/'.$imageProject;
            if (file_exists($rutaImagenProject)) {
                unlink($rutaImagenProject);
            }
        }
        
        // se crea una lista vacia
        $listNameImg = [];
        
        //recorre las imagenes multiples
        // para poder agregar a la lista $listNameImg
        foreach ($_FILES['imagesProject']['tmp_name'] as $key => $tmp_name){

            $nameImg = $_FILES['imagesProject']['name'][$key];
            $path_tmp = $_FILES['imagesProject']['tmp_name'][$key];
            $newName = "img-project-".$key.".".pathinfo($nameImg, PATHINFO_EXTENSION);
            
            // mueve al directorio actual /assets/img/projects/nameFolder.
            move_uploaded_file($path_tmp, "../../assets/img/projects/".$nameFolder."/".$newName);
            $listNameImg[]= $newName;

        }

        //convertir a cadena
        $cadenaListImg = implode(',', $listNameImg);  


    }else{
         
        // si esta vacia solo envia datos de la consulta antrior
        $cadenaListImg = $resultData['imagesProject'];
        $listNameImg = explode(',', $cadenaListImg);

    }
    

    // consulta sql para actualizar
    $sql = "UPDATE projects SET keyWords = '$keyWords', titleHTML = '$titleHTML', titleMeta = '$titleMeta', 
        descriptionMeta = '$descriptionMeta', imageMeta = '$newNameMeta', nameFolder = '$nameFolder', 
        imageItem = '$newNameItem', imagesProject = '$cadenaListImg', nameProject = '$nameProject', 
        descriptionItem = '$descriptionItem', descriptionProject = '$descriptionProject' WHERE projectID = '$id'";

    $result = mysqli_query($mysqli, $sql);
    
    // si resultado es verdadero
    if ($result) {

        // elimina los espacios y elimina la hoja php del projecto
        $title = preg_replace('/\s+/', '', $resultData['titleHTML']);
        $rutaHTML = '../../'.$title.'.php';
        if(file_exists($rutaHTML)){
            unlink($rutaHTML);
        }
        
        // crea una lista vacia 
        $listStyleImages = [];
        // recorre para almacenar el slider
        foreach ($listNameImg as $nameImg) {

            $temCadena = "
         <div class= 'swiper-slide qe_slider_blk'>
                <i>
                <img src='assets/img/projects/".$nameFolder."/".$nameImg."' alt=''>
             </i>
         </div>";

            $listStyleImages[] = $temCadena;

        }
        
        // la lista creada convierte en cadena
        $cadenaStyleImages = implode(' ', $listStyleImages);

        //genera hoja html
        $plantilla = file_get_contents('../../template/project_sub.php');
        $plantilla = str_replace(
            ['<?= $nameProject ?>','<?= $descriptionProject ?>','<?= $cadenaStyleImages ?>','<?= $title ?>','<?= $titleMeta ?>','<?= $descriptionMeta ?>','<?= $keyWords ?>','<?= $newNameMeta ?>','<?= $nameFolder ?>'], 
            [$nameProject,$descriptionProject,$cadenaStyleImages,$titleHTML,$titleMeta,$descriptionMeta,$keyWords,$newNameMeta,$nameFolder],
            $plantilla);

        $rutaCarpeta = '../../';
        $title = preg_replace('/\s+/', '', $titleHTML);
        $nuevoArchivo =$rutaCarpeta. $title .'.php';
        
        file_put_contents($nuevoArchivo, $plantilla);

   }

   
   header("Location: ../pages-list-project.php");
   die();
}

