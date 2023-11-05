<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Partials/headers/header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
function disabled($idUsuario)
{
  if (sessionUsuario()->getId() != $idUsuario) {
    return true;
  } else {
    return false;
  }
}
?>
<div class="registro-remate__container f-row align-center">
  <div class="registro-remate-form-wrap">
    <form id="form-actualizar-usuario" class="actualizar-usuario__form f-column"
      action="<?= PUBLIC_PATH ?>/perfil/<?= $usuario->getId(); ?>" method="POST"
      autocomplete="off">
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Usuario</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Usuario/form-usuario.php"; ?>
      <div class="header">
        <div class="container-1024 f-row">
          <h4>Imagen de perfil</h4>
        </div>
      </div>
      <div class="f-column align-center">
        <div class="profile-image-container">
          <?php for ($i = 1; $i <= 15; $i++): ?>
            <div class="image-container">
              <img class="image <?php if ($i == sessionUsuario()->getImagen()) {
                print("selected");
              } ?>" src="<?= PUBLIC_PATH ?>/public/imgs/Usuario/<?= $i ?>.webp"
                data-value="<?= $i ?>" />
            </div>
          <?php endfor; ?>
        </div>
      </div>
      <div class="header">
        <div class="container-1024 f-row">
          <h3>Datos personales</h3>
        </div>
      </div>
      <?php require BASE_PATH . "/Resources/Views/Usuario/form-datos-personales.php"; ?>
    </form>
  </div>
</div>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "actualizar-usuario");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>