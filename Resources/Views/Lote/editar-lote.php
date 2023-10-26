<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
?>
<div class="header">
  <div class="container-1024 f-row">
    <h2><?= $header_title ?></h2>
  </div>
</div>
<?php
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>
<form id="actualizar_lote" class="registro-remate__form f-column" method="POST"
  autocomplete="off" enctype="multipart/form-data">
  <?php require BASE_PATH . "/Resources/Views/Lote/form-editar-lote.php"; ?>
  <div class="header">
    <div class="container-1024 f-row">
      <h3>Editar ficha</h3>
    </div>
  </div>
  <?php require BASE_PATH . "/Resources/Views/Ficha/form-editar-ficha.php"; ?>
  <input type="hidden" name="loteConFicha[lote][id_lote]"
    value="<?= $lote->getId(); ?>">
  <input type="hidden" name="loteConFicha[ficha][id_ficha]"
    value="<?= $lote->getFicha()->getId(); ?>">
</form>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "actualizar-lote");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>