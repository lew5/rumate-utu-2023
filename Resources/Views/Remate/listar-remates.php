<div class="card-container f-column">
  <?php
  $remates = RemateController::listarRemates();
  if ($remates != false) {
    foreach ($remates as $remate) {
      $remateObj = (object) $remate;
      $imagen_data_uri = 'data:image/png;base64,' . base64_encode($remateObj->img_remate);
      if ($imagen_data_uri == "data:image/png;base64,") {
        $imagen_data_uri = PUBLIC_PATH . "/Public/imgs/no-image.webp";
        $remateObj->img_remate = $imagen_data_uri;
      } else {
        $remateObj->img_remate = $imagen_data_uri;
      }
      $view = Container::resolve(View::class);
      $view->assign("remate", $remateObj);
      $view->render(BASE_PATH . "/Resources/Views/Remate/card-remate.php");
    }
  } else {
    var_dump("no se encontraron remates"); //cambiar a algo mas mejor
  }

  ?>
</div>