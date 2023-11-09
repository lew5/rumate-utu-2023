<div class="perfil__usuario f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre de usuario</span>
        <input id="usuario__username"
          name="usuarioConPersona[usuario][username_usuario]"
          class="input-field__input" type="text" placeholder="Ejemplo: pepe123"
          autocomplete="off" class="input-field__input"
          value="<?= $usuario->getUsername(); ?>" required <?php if (disabled($usuario->getId())) {
              print "disabled";
            } ?> />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">E-mail</span>
        <input id="usuario__email"
          name="usuarioConPersona[usuario][email_usuario]"
          class="input-field__input" type="email"
          placeholder="pepe123@ejemplo.com" autocomplete="off"
          class="input-field__input" value="<?= $usuario->getEmail(); ?>"
          required <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?> />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Tipo de usuario</span>
        <input id="usuario__tipo-usuarios"
          name="usuarioConPersona[usuario][tipo_usuario]"
          class="input-field__input" type="text"
          placeholder="pepe123@ejemplo.com" autocomplete="off"
          class="input-field__input" value="<?= $usuario->getTipo(); ?>"
          disabled required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <?php if (sessionUsuario()->getId() == $usuario->getId()): ?>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Nueva contraseña</span>
          <input id="usuario__password"
            name="usuarioConPersona[usuario][password_usuario]"
            class="input-field__input" type="password" autocomplete="off"
            class="input-field__input" placeholder="pEpe12345#" />
        </label>
        <span class="input-field__error-message hidden error">Error</span>
      </div>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Confirmar contraseña</span>
          <input id="usuario__confirmPassword" class="input-field__input"
            type="password" autocomplete="off" class="input-field__input" />
        </label>
        <span class="input-field__error-message hidden error">Error</span>
      </div>
    <?php endif; ?>
    <input type="text" name="usuarioConPersona[usuario][id_usuario]" hidden
      value="<?= $usuario->getId(); ?>">
    <input type="hidden" name="usuarioConPersona[usuario][imagen_usuario]"
      value="<?= sessionUsuario()->getImagen(); ?>">
  </div>
</div>