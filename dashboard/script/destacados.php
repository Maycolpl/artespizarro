<?php
  include "connect.php";

  // consulta para traer los que  son outstand = 1
  // para luego ser recorrido
  $query = $mysqli->query("SELECT * FROM products WHERE outstand = 1");
  while ($resultado = $query->fetch_assoc())
  {
    $title = preg_replace('/\s+/', '', $resultado['titleHTML']);
    echo "<div class='in_pdc_blk'>
      <i>
        <a href='" . $title  . ".php'>
          <img src='assets/img/products/" . $resultado['nameFolder'] . "/" . $resultado['imageItem'] . "' alt=''>
        </a>
      </i>
      <div class='in_pdc_info'>
        <a href='" . $title  . ".php'>" . $resultado['nameProduct'] . "
          <br>
          <p>" . $resultado['descriptionItem'] . "<br>(Alabastro)</p>
        </a>
        <a href='" . $title  . ".php'><button>+</button></a>
      </div>
    </div>";
  }

  echo "</div>";
?>