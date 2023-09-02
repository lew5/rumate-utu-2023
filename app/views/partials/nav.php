<div class="navigation-wrap f-row">
  <div class="container-1024">
    <div class="navigation-container f-row align-center">
      <div class="navigation__brand">
        <a class="brand__link" href="/"></a>
        <img class="brand__img" src="assets/imgs/rumate-brand.webp"
          alt="logo de rumate" />
      </div>
      <?php
      if (isset($_SESSION['usuario'])) {
        $username = $_SESSION['usuario']['username'];
        if ($_SESSION['usuario']['estado'] == "ACTIVO") {
          require view_path("partials/nav-proveedor.php");
        } else if ($_SESSION['usuario']['estado'] == "INACTIVO") {
          require view_path("partials/nav-cliente.php");
        }
      } else {
        require view_path("partials/nav-guest.php");
      }
      ?>
    </div>
  </div>
</div>