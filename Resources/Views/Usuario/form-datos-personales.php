<div class="perfil__datos-personales f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre</span>
        <input id="datos-personales__nombre" name="nombre_persona"
          class="input-field__input" type="text" placeholder="Ingresa tu nombre"
          autocomplete="off" class="input-field__input"
          value="<?= $personaDeUsuario->getNombre(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">El nombre no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Apellido</span>
        <input id="datos-personales__apellido" name="apellido_persona"
          class="input-field__input" type="text"
          placeholder="Ingresa tu apellido" autocomplete="off"
          class="input-field__input"
          value="<?= $personaDeUsuario->getApellido(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">El apellido no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Cédula</span>
        <input id="datos-personales__cedula" name="ci_persona"
          class="input-field__input" type="number"
          placeholder="Ingresa tu cédula" autocomplete="off"
          class="input-field__input"
          value="<?= $personaDeUsuario->getCi(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">La cédula no es
        valida</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Barrio</span>
        <input id="datos-personales__barrio" name="barrio_persona"
          class="input-field__input" type="text"
          placeholder="Ejemplo: Maldonado" autocomplete="off"
          class="input-field__input"
          value="<?= $personaDeUsuario->getBarrio(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Calle</span>
        <input id="datos-personales__calle" name="calle_persona"
          class="input-field__input" type="text" placeholder="Ejemplo: Rincón"
          autocomplete="off" class="input-field__input"
          value="<?= $personaDeUsuario->getCalle(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Número</span>
        <input id="datos-personales__numero" name="numero_persona"
          class="input-field__input" type="number" placeholder="Ejemplo: 758"
          autocomplete="off" class="input-field__input"
          value="<?= $personaDeUsuario->getNumero(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Teléfono</span>
        <input id="datos-personales__telefono" name="telefono_persona"
          class="input-field__input" type="number"
          placeholder="Ejemplo: 099 999 999" autocomplete="off"
          class="input-field__input"
          value="<?= $personaDeUsuario->getTelefono(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
  </div>
</div>