<div class="card-container f-column">
  <?php
  foreach ($lotes as $lote) {
    $imagen_path = PUBLIC_PATH . "/Public/imgs/remate/" . $lote->getImagen();
    if ($lote->getImagen() == null) {
      $imagen_path = PUBLIC_PATH . "/Public/imgs/no-image.webp";
      $lote->setImagen($imagen_path);
    } else {
      $lote->setImagen($imagen_path);
    }
    $view = Container::resolve(View::class);
    $view->assign("lote", $lote);
    $view->render(BASE_PATH . "/Resources/Views/Lote/card-lote.php");
  }
  ?>
</div>