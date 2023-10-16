<div class="card-container f-column">
  <?php
  foreach ($lotes as $lote) {
    var_dump($lote);
    $view = Container::resolve(View::class);
    $view->assign("lote", $lote);
    $view->render(BASE_PATH . "/Resources/Views/Lote/card-lote.php");
  }
  ?>
</div>