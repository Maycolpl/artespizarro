<?php
  include "script/verify-session.php";

  include "partials/head.php";
  include "partials/header.php";
  include "partials/sidebar.php";
?>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>List Project</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">List Project</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

    
      <!-- Default Table -->
      <table class="table">
                <thead>
                  <tr>
                  
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                   include 'script/project.php'
                ?>

                </tbody>
              </table>
              <!-- End Default Table Example -->

    </main><!-- End #main -->

<?php
  include "partials/footer.php";
  include "partials/end.php";
?>