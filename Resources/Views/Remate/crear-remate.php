<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Partials/headers/header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>
<div class="registro-remate__container f-row align-center">
  <div class="registro-remate-form-wrap">
    <form class="registro-remate__form f-column"
      action="<?= PUBLIC_PATH ?>/admin/registrar-remate" method="POST"
      autocomplete="off">
      <?php require BASE_PATH . "/Resources/Views/Remate/form-remate.php"; ?>
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Registrar lote</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Remate/form-lote.php"; ?>
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Registrar ficha</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Remate/form-ficha.php"; ?>
      <div class="registro-remate__actions f-row">
        <div class="button">
          <input class="button__input button__input--nuevo-lote" type="button"
            value="Guardar y limpiar" />
        </div>
        <div class="button">
          <input class="button__input" type="submit" value="Publicar remate" />
        </div>
      </div>
    </form>
  </div>
</div>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "remate");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>