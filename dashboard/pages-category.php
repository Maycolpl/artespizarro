<?php
  include "script/verify-session.php";
  include 'script/verify-category.php';
  include "partials/head.php";
  include "partials/header.php";
  include "partials/sidebar.php";
?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>New Category</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">New Category</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">New Category</h5>

              <form action="<?php echo $action; ?>" method="POST">

              <div class="col mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name Category</label>
                  <div class="col-sm-10">
                  <?php echo $input; ?>
                  </div>
                </div>

              <button type='submit' class="btn btn-primary" name="<?php echo $typeButton; ?>">Guardar</button>

              </form><!-- End General Form Elements -->

               <!-- Default Table -->
        <table class="table">
                <thead>
                  <tr>
                  
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   include 'script/category.php'
                ?>

                </tbody>
              </table>
              <!-- End Default Table Example -->

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