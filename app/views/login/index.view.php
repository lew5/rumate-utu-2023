<?php
require view_path("partials/doctype.php");
require view_path("partials/head.php");
view("partials/login-register/main-head.php", [
  'title' => "Login",
  'description' => "Inicia sesión"
]);
?>
<div class="inputs-wrap">
  <div class="input-field">
    <label class="input-field__label f-column">
      <span class="label__text">Nombre de usuario</span>
      <input name="username" type="text" placeholder="Ingresa tu usuario"
        autocomplete="off"
        class="input-field__input <?php isset($error) ? print("input-field__input--error") : print(""); ?>"
        required
        value="<?php isset($username) ? print($username) : print(""); ?>" />
    </label>
    <span
      class="input-field__error-message <?php isset($error) ? print("") : print("hidden"); ?> error"><?php isset($error) ? print($error) : print("Error"); ?></span>
  </div>
  <div class="input-field">
    <label class="input-field__label f-column">
      <span class="label__text">Contraseña</span>
      <input name="password"
        class="input-field__input <?php isset($error) ? print("input-field__input--error") : print(""); ?>"
        type="password" placeholder="Ingresa tu contraseña" autocomplete="off"
        class="input-field__input" required />
    </label>
    <span class="input-field__error-message hidden error">Error</span>
  </div>
  <a href="" class="link">¿Olvidaste tu contraseña?</a>
</div>
<div class="actions f-column">
  <div class="button">
    <input class="button__input" type="submit" name="login-btn"
      value="INGRESAR" />
  </div>
  <span>¿No tienes una cuenta?
    <a href="/registro" class="link">Regístrate</a></span>
</div>
</form>
</div>
</div>
<div class="login-register__background"></div>
</main>
<?php view("partials/footer.php"); ?>