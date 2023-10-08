<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
?>
<main class="login-register f-row">
  <div class="login-register__container">
    <div class="login-register-form-wrap">
      <form class="login-register__form f-column" action="/registro/hola"
        method="POST" autocomplete="off">
        <?php require BASE_PATH . "/Resources/Views/Partials/login-register__header.php"; ?>
        <?php
        require BASE_PATH . "/Resources/Views/Partials/register-step-1.php";
        require BASE_PATH . "/Resources/Views/Partials/register-step-2.php";
        require BASE_PATH . "/Resources/Views/Partials/register-step-3.php";
        ?>
        <div class="actions f-column">
          <div class="button">
            <input class="button__input" type="button" value="SIGUIENTE"
              disabled />
          </div>
          <span> <a class="link hidden">VOLVER</a></span>
          <span>¿Ya tienes una cuenta?
            <a href="<?= PUBLIC_PATH ?>/login" class="link">Inicia
              sesión</a></span>
        </div>
      </form>
    </div>
  </div>
  <div class="login-register__background"></div>
</main>
<?php $view = Container::resolve(View::class);
$view->assign("script", "registro");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php"); ?>