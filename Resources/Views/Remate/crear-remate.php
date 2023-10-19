<?php
require BASE_PATH . "/Resources/Views/Partials/doctype.php";
require BASE_PATH . "/Resources/Views/Partials/head.php";
require BASE_PATH . "/Resources/Views/Partials/nav.php";
require BASE_PATH . "/Resources/Views/Remate/remate-header.php";
require BASE_PATH . "/Resources/Views/Partials/main-start.php";
require BASE_PATH . "/Resources/Views/Partials/container-1024-start.php";
?>
<form action="<?= PUBLIC_PATH ?>/admin/registrar-remate" method="POST"
  enctype="multipart/form-data">
  <div class="register-step register-step--1">
    <div class="inputs-wrap">



      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Titulo del remate</span>
          <input id="titulo_remate" name="titulo_remate"
            class="input-field__input" type="text"
            placeholder="Ingresa el titulo del remate" autocomplete="off"
            class="input-field__input" required />
        </label>
        <span class="input-field__error-message hidden error">El nombre no es
          valido</span>
      </div>



      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Imagen <span
              class="opcional">(opcional)</span></span>
          <input id="imagen_remate" name="imagen_remate"
            class="input-field__input" type="file"
            accept="image/png, image/jpeg" class="input-field__input" />
        </label>
        <span class="input-field__error-message hidden error">El archivo debe
          ser
          una imagen</span>
      </div>


      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Fecha de inicio</span>
          <input id="fecha_inicio_remate" name="fecha_inicio_remate"
            class="input-field__input" type="datetime-local"
            class="input-field__input" required />
        </label>
        <span class="input-field__error-message hidden error">Ingresa una
          fecha</span>
      </div>

      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Fecha de finalización</span>
          <input id="fecha_final_remate" name="fecha_final_remate"
            class="input-field__input" type="datetime-local"
            class="input-field__input" required />
        </label>
        <span class="input-field__error-message hidden error">Ingresa una
          fecha</span>
      </div>

      <div class="button">
        <input class="button__input" type="submit" value="SIGUIENTE" />
      </div>

    </div>
  </div>
</form>
<?php
require BASE_PATH . "/Resources/Views/Partials/container-1024-end.php";
require BASE_PATH . "/Resources/Views/Partials/main-end.php";
$view = Container::resolve(View::class);
$view->assign("script", "remate");
$view->render(BASE_PATH . "/Resources/Views/Partials/footer.php");
?>