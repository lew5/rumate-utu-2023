<div class="card-container f-column">
  <?php
  $idRemate = $remate->getId();
  foreach ($remate->getLotes() as $lote) {
    $loteImg = $lote->getImagen();
    if ($loteImg && file_exists(BASE_PATH . "/Public/imgs/Lote/" . $loteImg)) {
      $imagen_path = PUBLIC_PATH . "/Public/imgs/Lote/" . $loteImg;
    } else {
      $imagen_path = PUBLIC_PATH . "/Public/imgs/no-image.webp";
    }
    $lote->setImagen($imagen_path);
    $view = Container::resolve(View::class);
    $view->assign("lote", $lote);
    $view->assign("idRemate", $idRemate);
    $view->render(BASE_PATH . "/Resources/Views/Lote/card-lote.php");
  }
  ?>
</div>