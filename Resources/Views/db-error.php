<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
?>
<div class="cow-404-container">
  <div class="cow-404">
    <h2>Algo salió mal</h2>
    <img src="/imgs/db-error-cow.webp" alt="404 img" width="400px"
      height="400px">
    <code>Error code: <?= $error ?></code>
  </div>
</div>
<?php
?>