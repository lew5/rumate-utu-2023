<?php
if (sessionAdmin() || sessionRoot()): ?>
  <div class="header">
    <div class="container-1024 f-row">
      <h2><?= $header_title ?></h2>
      <a href="<?= PUBLIC_PATH ?>/admin/registrar-remate"
        class="button-link">Nuevo remate</a>
      <!-- require BASE_PATH . "/Resources/Views/Partials/menu-filtros.php"; -->
    </div>
  </div>
  <?php
else:
  require BASE_PATH . "/Resources/Views/Partials/headers/header.php";
endif;
?>