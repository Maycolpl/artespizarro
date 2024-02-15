<?php
  include "script/verify-session.php";
  include "script/verify-product.php";
  include "partials/head.php";
  include "partials/header.php";
  include "partials/sidebar.php";

?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>New Product</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">New Product</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">New Product</h5>

              <form action="script/edit-product.php" method="POST" enctype="multipart/form-data">
              
              <input type="hidden" name="id" value="<?php echo $id?>">

              <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">keyWords</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="keyWords" required value="<?php echo $resultData['keyWords'] ?>">
                  </div>
                </div>

          
                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Title HTML</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titleHtml" required value="<?php echo $resultData['titleHTML'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Title Meta</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="titleMeta" required value="<?php echo $resultData['titleMeta'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Description Meta</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionMeta" required><?php echo $resultData['descriptionMeta'] ?></textarea>
                  </div>
                </div>


                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image Meta</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="imageMeta">
                  </div>
                </div>


                 
                <div class="col mb-3">
                  <label for="inputText" class="col-sm-3 col-form-label">Name Folder</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameFolder" required value="<?php echo $resultData['nameFolder'] ?>">
                  </div>
                </div>

           



                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image item</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" accept="image/*" name="imageItem">
                  </div>
                </div>

             

                <div class="col mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Images Product</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" multiple name="imagesProduct[]">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name Product</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nameProduct" required value="<?php echo $resultData['nameProduct'] ?>">
                  </div>
                </div>

               

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Description Item</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionItem" required><?php echo $resultData['descriptionItem'] ?></textarea>
                  </div>
                </div>
                

                <div class="col mb-3">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Description Product</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="descriptionProduct" required><?php echo $resultData['descriptionProduct'] ?></textarea>
                  </div>
                </div>


                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">outstand</legend>
                  <div class="col-sm-10">

                  <input type="checkbox" name="mi_checkbox" <?php echo $resultData['outstand'] == 1 ? 'checked' : ''; ?>>

                    
                  </div>
                </fieldset>


                <div class="col mb-3">
                  <label class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="category" aria-label="Default select example">
                      <option selected disabled><?php echo $resultData['category'] ?></option>
                      <?php
                         include "script/select-category.php";
                      ?>
                    </select>
                  </div>
                </div>

                


                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Workshop</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="workshop" required value="<?php echo $resultData['workshop'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Material</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="material" required value="<?php echo $resultData['material'] ?>">
                  </div>
                </div>

                <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Dimensions</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="dimensions" required value="<?php echo $resultData['dimensions'] ?>">
                  </div>
                </div>


              <button type='submit' class="btn btn-primary" name="update">Editar y Generar</button>

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