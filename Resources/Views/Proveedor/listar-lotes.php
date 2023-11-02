<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Partials/headers/header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>

<div class="card-container f-column">
  <?php
  foreach ($lotes as $lote) {
    $loteImg = $lote->getImagen();
    if ($loteImg && file_exists(BASE_PATH . "/Public/imgs/Lote/" . $loteImg)) {
      $imagen_path = PUBLIC_PATH . "/Public/imgs/Lote/" . $loteImg;
    } else {
      $imagen_path = PUBLIC_PATH . "/Public/imgs/no-image.webp";
    }
    $lote->setImagen($imagen_path);
    $view = Container::resolve(View::class);
    $view->assign("lote", $lote);
    $view->render(BASE_PATH . "/Resources/Views/Proveedor/card-lote.php");
  }
  ?>
</div>

<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "poner script");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>