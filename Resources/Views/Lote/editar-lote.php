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
<?php require BASE_PATH . "/Resources/Views/Remate/form-lote.php"; ?>
<div class="header">
  <div class="container-1024 f-row">
    <h3>Editar ficha</h3>
  </div>
</div>
<?php require BASE_PATH . "/Resources/Views/Remate/form-ficha.php"; ?>

<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "poner script");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>