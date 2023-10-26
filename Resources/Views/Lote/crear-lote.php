<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Partials/headers/header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>
<div class="registro-lote__container f-row align-center">
  <div class="registro-lote-form-wrap">
    <form class="registro-lote__form f-column"
      action="<?= PUBLIC_PATH ?>/admin/remate/<?= $idRemate ?>/registrar-lote"
      method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Registrar lote</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Lote/form-lote.php"; ?>
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Registrar ficha</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Ficha/form-ficha.php"; ?>
      <input type="hidden" id="id-remate" name="id_remate"
        value="<?= $idRemate ?>">
      <input type="hidden" id="lote-data" name="lote-data">
    </form>
  </div>
</div>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "registro-lote");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>