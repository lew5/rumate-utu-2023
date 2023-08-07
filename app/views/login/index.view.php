<?php
require view_path("partials/doctype.php");
require view_path("partials/head.php");
?>
<main class="login f-row">
  <div class="login__container">
    <div class="login-form-wrap">
      <form class="login__form f-column" action="/login" method="POST"
        autocomplete="off">
        <div class="login-logo">
          <img src="assets/imgs/rumate-brand.webp" alt="rumate-logo" />
        </div>
        <div class="login__header f-column">
          <h1>Inicio de sesión</h1>
          <p>Inicia sesión para poder participar en los remates.</p>
        </div>
        <div class="inputs-wrap">
          <div class="text-field">
            <label class="text-field__label f-column">
              <span class="label__text">Nombre de usuario</span>
              <input name="username" type="text"
                placeholder="Ingresa tu usuario" autocomplete="off"
                class="text-field__input <?php isset($error) ? print("text-field__input--error") : print(""); ?>"
                required
                value="<?php isset($username) ? print($username) : print(""); ?>" />
            </label>
            <span
              class="text-field__error-message <?php isset($error) ? print("") : print("hidden"); ?> error"><?php isset($error) ? print($error) : print("Error"); ?></span>
          </div>
          <div class="text-field">
            <label class="text-field__label f-column">
              <span class="label__text">Contraseña</span>
              <input name="password"
                class="text-field__input <?php isset($error) ? print("text-field__input--error") : print(""); ?>"
                type="password" placeholder="Ingresa tu contraseña"
                autocomplete="off" class="text-field__input" required />
            </label>
            <span class="text-field__error-message hidden error">Error</span>
          </div>
          <a href="" class="link">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="button">
          <input class="button__input" type="submit" name="login-btn"
            value="INGRESAR" />
        </div>
        <span class="forgotten-password">¿No tienes una cuenta?
          <a href="/registro" class="link">Regístrate</a></span>
      </form>
    </div>
  </div>
  <div class="login__background"></div>
</main>
<?php view("partials/footer.php"); ?>