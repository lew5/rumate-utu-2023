<div class="perfil__datos-personales f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre</span>
        <input id="datos-personales__nombre"
          name="persona[nombre_persona]"
          class="input-field__input" type="text" placeholder="Ingresa tu nombre"
          autocomplete="off" class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">El nombre no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Apellido</span>
        <input id="datos-personales__apellido"
          name="persona[apellido_persona]"
          class="input-field__input" type="text"
          placeholder="Ingresa tu apellido" autocomplete="off"
          class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">El apellido no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Cédula</span>
        <input id="datos-personales__cedula"
          name="persona[ci_persona]"
          class="input-field__input" type="number"
          placeholder="Ingresa tu cédula" autocomplete="off"
          class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">La cédula no es
        valida</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Barrio</span>
        <input id="datos-personales__barrio"
          name="persona[barrio_persona]"
          class="input-field__input" type="text"
          placeholder="Ejemplo: Maldonado" autocomplete="off"
          class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Calle</span>
        <input id="datos-personales__calle"
          name="persona[calle_persona]"
          class="input-field__input" type="text" placeholder="Ejemplo: Rincón"
          autocomplete="off" class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Número</span>
        <input id="datos-personales__numero"
          name="persona[numero_persona]"
          class="input-field__input" type="number" placeholder="Ejemplo: 758"
          autocomplete="off" class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Teléfono</span>
        <input id="datos-personales__telefono"
          name="persona[telefono_persona]"
          class="input-field__input" type="number"
          placeholder="Ejemplo: 099 999 999" autocomplete="off"
          class="input-field__input" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="registro-remate__actions f-row">
      <div class="button">
        <input id="btn-actualizar-usuario" class="button__input" type="submit"
          value="Crear empleado" />
      </div>
    </div>
  </div>
</div>