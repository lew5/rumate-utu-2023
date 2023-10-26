<?php
if (sessionAdmin() || sessionRoot()): ?>
  <div class="header">
    <div class="container-1024 f-row">
      <h2><?= $header_title ?></h2>
      <?php require BASE_PATH . "/Resources/Views/Partials/headers/barra-de-busqueda.php"; ?>
      <a href="<?= PUBLIC_PATH ?>/admin/registrar-lote" class="button-link">Nuevo
        lote</a>
    </div>
  </div>
<?php else: ?>
  <div class="header">
    <div class="container-1024 f-row">
      <h2><?= $header_title ?></h2>
      <?php require BASE_PATH . "/Resources/Views/Partials/headers/barra-de-busqueda.php"; ?>
    </div>
  </div>
<?php endif; ?>