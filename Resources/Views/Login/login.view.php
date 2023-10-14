<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
if (isset($_SESSION['loginError'])) {
  $msg = $_SESSION['loginError']['error'];
  $username = $_SESSION['loginError']['username'];
}
?>
<main class="login-register f-row">
  <div class="login-register__container">
    <div class="login-register-form-wrap">
      <form class="login-register__form f-column"
        action="<?= PUBLIC_PATH ?>/login/validar" method="POST"
        autocomplete="off">
        <?php require BASE_PATH . "/Resources/Views/Partials/login-register__header.php"; ?>
        <div class="inputs-wrap">
          <div class="input-field">
            <label class="input-field__label f-column">
              <span class="label__text">Nombre de usuario</span>
              <input name="username" type="text"
                placeholder="Ingresa tu usuario" autocomplete="off"
                class="input-field__input" required
                value="<?php isset($username) ? print($username) : print(""); ?>" />
            </label>
            <span
              class="input-field__error-message <?php isset($_SESSION['loginError']) ? print("") : print("hidden"); ?> error"><?php isset($_SESSION['loginError']) ? print($msg) : print("Error"); ?></span>
          </div>
          <div class="input-field">
            <label class="input-field__label f-column">
              <span class="label__text">Contraseña</span>
              <input name="password"
                class="input-field__input <?php isset($_SESSION['passError']) ? print("input-field__input--error") : print(""); ?>"
                type="password" placeholder="Ingresa tu contraseña"
                autocomplete="off" class="input-field__input" required />
            </label>
            <span
              class="input-field__error-message <?php isset($_SESSION['passError']) ? print("") : print("hidden"); ?> error"><?php isset($_SESSION['passError']) ? print($msg) : print("Error"); ?></span>
          </div>
          <a href="" class="link">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="actions f-column">
          <div class="button">
            <input class="button__input" type="submit" name="login-btn"
              value="INGRESAR" />
          </div>
          <span>¿No tienes una cuenta?
            <a href="<?= PUBLIC_PATH ?>/registro"
              class="link">Regístrate</a></span>
        </div>
      </form>
    </div>
  </div>
  <div class="login-register__background"></div>
</main>
<?php $view = Container::resolve(View::class);
$view->assign("script", "poner script");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php"); ?>
<?php //session_destroy(); ?>