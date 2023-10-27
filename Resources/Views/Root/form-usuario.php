<div class="perfil__usuario f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre de usuario</span>
        <input id="usuario__username"
          name="usuario[username_usuario]"
          class="input-field__input" type="text" placeholder="Ejemplo: pepe123"
          autocomplete="off" class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">E-mail</span>
        <input id="usuario__email"
          name="usuario[email_usuario]"
          class="input-field__input" type="email"
          placeholder="pepe123@ejemplo.com" autocomplete="off"
          class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Contraseña</span>
        <input id="usuario__password"
          name="usuario[password_usuario]"
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
    <input type="text" name="usuario[tipo_usuario]"
      value="ADMINISTRADOR" hidden>
  </div>
</div>