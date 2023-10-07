<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Partials/header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
require BASE_PATH . "/Resources/Views/Partials/remate-lote-container.php";
?>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
// var_dump($lote);
$view = Container::resolve(View::class);
$view->assign("script", "remate");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>