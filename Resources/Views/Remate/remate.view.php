<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
?>

<div class="header">
  <div class="container-1024 f-row">
    <h2><?= $header_title ?></h2>
    <div class="input-field">
      <label class="input-field__label f-column">
        <input id="busqueda_lote" name="busqueda_lote"
          class="input-field__input" type="text" autocomplete="off"
          placeholder="Buscar lote" />
      </label>
    </div>
  </div>
</div>

<?php
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>

<?php require BASE_PATH . "/Resources/Views/Lote/listar-lotes.php"; ?>

<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "busqueda-lote");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>