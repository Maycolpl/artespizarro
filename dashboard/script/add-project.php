<?php
    
    include "connect.php";

   
    if (isset($_POST['subir'])) {

        // Recuperar los valores del formulario en variables
        $keyWords = $_POST['keyWords'];
        $titleHTML = $_POST['titleHTML'];
        $titleMeta = $_POST['titleMeta'];
        $descriptionMeta = $_POST['descriptionMeta'];
        $imageMeta = $_FILES['imageMeta']['tmp_name'];
        $imageMeta_name = $_FILES['imageMeta']['name'];
        $nameFolder = $_POST['nameFolder'];
        $imageItem = $_FILES['imageItem']['tmp_name'];
        $imageItem_name = $_FILES['imageItem']['name'];
        $imagesProject = $_FILES['imagesProject']['tmp_name'];
        $nameProject = $_POST['nameProject'];
        $descriptionItem = $_POST['descriptionItem'];
        $descriptionProject = $_POST['descriptionProject'];


       
         //crea la carpeta para el projecto
         $nameFolder = preg_replace('/\s+/', '', $nameFolder);
         if (!file_exists('../../assets/img/projects/'.$nameFolder)) {
            mkdir('../../assets/img/projects/'.$nameFolder, 0777, true);
            
         
    
            //genera un nuevo nombre de imagen para meta e item con respectiva extenciones
            $newNameMeta = "img-meta.".pathinfo($imageMeta_name, PATHINFO_EXTENSION);
            $newNameItem = "img-item.".pathinfo($imageItem_name, PATHINFO_EXTENSION);
    
            move_uploaded_file($imageMeta, "../../assets/img/projects/".$nameFolder."/".$newNameMeta);
            move_uploaded_file($imageItem, "../../assets/img/projects/".$nameFolder."/".$newNameItem);
    
    
            $listNameImg = [];
            
            //recorre las imagenes multiples
               
                foreach ($_FILES['imagesProject']['tmp_name'] as $key => $tmp_name){
    
                    $nameImg = $_FILES['imagesProject']['name'][$key];
                    $path_tmp = $_FILES['imagesProject']['tmp_name'][$key];
                    $newName = "img-project-".$key.".".pathinfo($nameImg, PATHINFO_EXTENSION);
    
                    move_uploaded_file($path_tmp, "../../assets/img/projects/".$nameFolder."/".$newName);
                    $listNameImg[]= $newName;
    
                }
    
                //convertir a cadena
                $cadenaListImg = implode(',', $listNameImg);  
                
                
                // insertar los datos a la base de datos
                $sql = "INSERT INTO projects (keyWords, titleHTML, titleMeta, descriptionMeta, imageMeta, nameFolder, imageItem, imagesproject, nameproject, descriptionItem, descriptionproject) 
                       VALUES ('$keyWords', '$titleHTML', '$titleMeta', '$descriptionMeta', '$newNameMeta', '$nameFolder', '$newNameItem', '$cadenaListImg', '$nameProject', '$descriptionItem', '$descriptionProject')";
    
                $result = mysqli_query($mysqli, $sql);
    
    
            
                if ($result) {
                
    
                    $listStyleImages = [];
    
                    foreach ($listNameImg as $nameImg) {
    
                        $temCadena = "
                     <div class= 'swiper-slide qe_slider_blk'>
                            <i>
                            <img src='assets/img/projects/".$nameFolder."/".$nameImg."' alt=''>
                         </i>
                     </div>";
    
                        $listStyleImages[] = $temCadena;
    
                    }
    
                    $cadenaStyleImages = implode(' ', $listStyleImages);
    
                    //genera hoja html
                    $plantilla = file_get_contents('../../template/project_sub.php');
                    $plantilla = str_replace(
                        ['<?= $nameProject ?>','<?= $descriptionProject ?>','<?= $cadenaStyleImages ?>','<?= $title ?>','<?= $titleMeta ?>','<?= $descriptionMeta ?>','<?= $keyWords ?>','<?= $newNameMeta ?>','<?= $nameFolder ?>'], 
                        [$nameProject,$descriptionProject,$cadenaStyleImages,$titleHTML,$titleMeta,$descriptionMeta,$keyWords,$newNameMeta,$nameFolder],
                        $plantilla);
    
                    $rutaCarpeta = '../../';
                    $title = preg_replace('/\s+/', '', $titleHTML);
                    $nuevoArchivo =$rutaCarpeta.$title.'.php';
                    
                    file_put_contents($nuevoArchivo, $plantilla);
                    
                    
                    header("Location: ../pages-project.php");
                    die();
    
               }
           }  
    }