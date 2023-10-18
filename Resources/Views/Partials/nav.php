<div class="navigation-wrap f-row">
  <div class="container-1024">
    <div class="navigation-container f-row align-center">
      <div class="navigation__brand">
        <a class="brand__link" href="<?= PUBLIC_PATH ?>"></a>
        <img class="brand__img"
          src="<?= PUBLIC_PATH ?>/Public/imgs/rumate-nav-brand.webp"
          alt="logo de rumate" />
      </div>
      <?php
      if (!isset($_SESSION['usuario'])) {
        require BASE_PATH . "/Resources/Views/Partials/nav-invitado.php";
      } else {
        if (sessionCliente()) {
          require BASE_PATH . "/Resources/Views/Partials/nav-cliente.php";
        } elseif (sessionProveedor()) {
          require BASE_PATH . "/Resources/Views/Partials/nav-proveedor.php";
        } elseif (sessionAdmin()) {
          require BASE_PATH . "/Resources/Views/Partials/nav-administrador.php";
        } elseif (sessionRoot()) {
          require BASE_PATH . "/Resources/Views/Partials/nav-root.php";
        } else {
          // Tipo de usuario desconocido
        }
      }
      ?>

    </div>
  </div>
</div>