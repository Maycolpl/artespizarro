<?php
  include "script/verify-session.php";
 include "script/verify-project.php";
  include "partials/head.php";
  include "partials/header.php";
  include "partials/sidebar.php";

?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>New Proyect</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="indexphp">Home</a></li>
            <li class="breadcrumb-item active">New Project</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">New Project</h5>

        <form action="script/edit-project.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $id?>">

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">keyWords</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keyWords" value="<?php echo $resultData['keyWords'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Titulo HTML</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control " name="titleHTML" value="<?php echo $resultData['titleHTML'] ?>">
                  </div>
                </div>


                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Titulo Meta</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titleMeta" value="<?php echo $resultData['titleMeta'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Descripción Meta</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionMeta"><?php echo $resultData['descriptionMeta'] ?></textarea>
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Imagen Meta</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="imageMeta">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Nombre Folder</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameFolder" value="<?php echo $resultData['nameFolder'] ?>">
                  </div>
                </div>
               
                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Imagen Item</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="imageItem">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Images Project</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" multiple name="imagesProject[]">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Nombre Proyecto</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameProject" value="<?php echo $resultData['nameProject'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Descripción Item</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionItem"><?php echo $resultData['descriptionItem'] ?></textarea>
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Descripción Proyecto</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionProject"><?php echo $resultData['descriptionProject'] ?></textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary" name="update">Guardar y Generar</button> 

        </form><!-- End General Form Elements -->
     

        </div>
          </div>

        </div>
        </div>
      </section>

    </main><!-- End #main -->
    
<?php
  include "partials/footer.php";
  include "partials/end.php";
?>