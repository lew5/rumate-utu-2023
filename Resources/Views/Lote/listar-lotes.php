<div class="card-container f-column">
  <?php
  foreach ($lotes as $lote) {
    $loteObj = (object) $lote;
    // $imagen_data_uri = 'data:image/png;base64,' . base64_encode($loteObj->img_remate);
    // if ($imagen_data_uri == "data:image/png;base64,") {
    //   $imagen_data_uri = PUBLIC_PATH . "/Public/imgs/no-image.webp";
    //   $loteObj->img_remate = $imagen_data_uri;
    // } else {
    //   $loteObj->img_remate = $imagen_data_uri;
    // }
    $view = Container::resolve(View::class);
    $view->assign("lote", $loteObj);
    $view->render(BASE_PATH . "/Resources/Views/Lote/card-lote.php");
  }
  ?>
</div>