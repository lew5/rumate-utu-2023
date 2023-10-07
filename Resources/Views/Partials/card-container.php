<div class="card-container f-column">
  <?php
  if (isset($remates_data)) {
    foreach ($remates_data as $rem) {
      $remate = Container::resolve(Remate::class)->llenarRemate($rem);
      $imagen_data_uri = 'data:image/png;base64,' . base64_encode($remate->getImg());
      if ($imagen_data_uri == "data:image/png;base64,") {
        $imagen_data_uri = "/imgs/no-image.webp";
        $remate->setImg($imagen_data_uri);
      } else {
        $remate->setImg($imagen_data_uri);
      }
      $view = Container::resolve(View::class);
      $view->assign("remate", $remate);
      $view->render(BASE_PATH . "/Resources/Views/Partials/card-remate.php");
    }
  } elseif (isset($lotes)) {
    foreach ($lotes as $lote) {
      // $imagen_data_uri = 'data:image/png;base64,' . base64_encode($lote->getImg());
      // $lote->setImg($imagen_data_uri);
      $view = Container::resolve(View::class);
      $view->assign("lote", $lote);
      $view->render(BASE_PATH . "/Resources/Views/Partials/card-lote.php");
    }
  }
  ?>
</div>