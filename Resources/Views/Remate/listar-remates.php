<div class="card-container f-column">
  <?php
  if ($remates != false) {
    foreach ($remates as $remate) {
      $imagen_data_uri = 'data:image/png;base64,' . base64_encode($remate->getImagen());
      if ($imagen_data_uri == "data:image/png;base64,") {
        $imagen_data_uri = PUBLIC_PATH . "/Public/imgs/no-image.webp";
        $remate->setImagen($imagen_data_uri);
      } else {
        $remate->setImagen($imagen_data_uri);
      }
      $view = Container::resolve(View::class);
      $view->assign("remate", $remate);
      $view->render(BASE_PATH . "/Resources/Views/Remate/card-remate.php");
    }
  } else {
    var_dump("no se encontraron remates"); //cambiar a algo mas mejor
  }

  ?>
</div>