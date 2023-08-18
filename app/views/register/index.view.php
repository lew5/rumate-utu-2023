<?php
require view_path("partials/doctype.php");
require view_path("partials/head.php");
view("partials/login-register/main-head.php", [
  'title' => "Registro",
  'description' => "Regístrate"
]);

view("partials/login-register/register-step-1.php");
view("partials/login-register/register-step-2.php");
view("partials/login-register/register-step-3.php");

?>
<div class="actions f-column">
  <div class="button">
    <input class="button__input" type="button" value="SIGUIENTE" disabled />
  </div>
  <span> <a class="link hidden">VOLVER</a></span>
  <span>¿Ya tienes una cuenta?
    <a href="/login" class="link">Inicia sesión</a></span>
</div>
</form>
</div>
</div>
<div class="login-register__background"></div>
</main>
<?php view("partials/footer.php", [
  'script' => "js/register.js"
]); ?>