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
<div class="input-field">
  <label class="input-field__label f-column">
    <span class="label__text">Imagen <span
        class="opcional">(opcional)</span></span>
    <input id="registro-remate__imagen_lote" name="imagen_lote"
      class="input-field__input" type="file" accept="image/png, image/jpeg"
      class="input-field__input" />
  </label>
  <span class="input-field__error-message hidden error">El archivo
    debe ser una imagen</span>
</div>
<?php require BASE_PATH . "/Resources/Views/Lote/form-editar-lote.php"; ?>
<div class="header">
  <div class="container-1024 f-row">
    <h3>Editar ficha</h3>
  </div>
</div>
<?php require BASE_PATH . "/Resources/Views/Lote/form-editar-ficha.php"; ?>
<div class="registro-remate__actions f-row">
  <div class="button">
    <input class="button__input" type="submit" value="Actualizar cambios" />
  </div>
</div>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "poner script");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>