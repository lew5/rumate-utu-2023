<div class="perfil__usuario f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre de usuario</span>
        <input id="usuario__username" name="usuario[username_usuario]"
          class="input-field__input" type="text" placeholder="Ejemplo: pepe123"
          autocomplete="off" class="input-field__input"
          value="<?= $usuario->getUsername(); ?>" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">E-mail</span>
        <input id="usuario__email" name="usuario[email_usuario]"
          class="input-field__input" type="email"
          placeholder="pepe123@ejemplo.com" autocomplete="off"
          class="input-field__input" value="<?= $usuario->getEmail(); ?>"
          required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Tipo de usuario</span>
        <input id="usuario__tipo-usuarios" name="usuario[tipo_usuario]"
          class="input-field__input" type="text"
          placeholder="pepe123@ejemplo.com" autocomplete="off"
          class="input-field__input" value="<?= $usuario->getTipo(); ?>"
          disabled required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
  </div>
</div>