<div class="perfil__datos-personales f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Nombre</span>
        <input id="datos-personales__nombre"
          name="usuarioConPersona[persona][nombre_persona]"
          class="input-field__input" type="text" placeholder="Ingresa tu nombre"
          autocomplete="off" class="input-field__input"
          value="<?= $persona->getNombre(); ?>" required
          <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?> />
      </label>
      <span class="input-field__error-message hidden error">El nombre no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Apellido</span>
        <input id="datos-personales__apellido"
          name="usuarioConPersona[persona][apellido_persona]"
          class="input-field__input" type="text"
          placeholder="Ingresa tu apellido" autocomplete="off"
          class="input-field__input" value="<?= $persona->getApellido(); ?>"
          required <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?>/>
      </label>
      <span class="input-field__error-message hidden error">El apellido no es
        valido</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Cédula</span>
        <input id="datos-personales__cedula"
          name="usuarioConPersona[persona][ci_persona]"
          class="input-field__input" type="number"
          placeholder="Ingresa tu cédula" autocomplete="off"
          class="input-field__input" value="<?= $persona->getCi(); ?>"
          required <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?>/>
      </label>
      <span class="input-field__error-message hidden error">La cédula no es
        valida</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Barrio</span>
        <input id="datos-personales__barrio"
          name="usuarioConPersona[persona][barrio_persona]"
          class="input-field__input" type="text"
          placeholder="Ejemplo: Maldonado" autocomplete="off"
          class="input-field__input" value="<?= $persona->getBarrio(); ?>"
          required <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?>/>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Calle</span>
        <input id="datos-personales__calle"
          name="usuarioConPersona[persona][calle_persona]"
          class="input-field__input" type="text" placeholder="Ejemplo: Rincón"
          autocomplete="off" class="input-field__input"
          value="<?= $persona->getCalle(); ?>" required <?php if (disabled($usuario->getId())) {
              print "disabled";
            } ?>/>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Número</span>
        <input id="datos-personales__numero"
          name="usuarioConPersona[persona][numero_persona]"
          class="input-field__input" type="number" placeholder="Ejemplo: 758"
          autocomplete="off" class="input-field__input"
          value="<?= $persona->getNumero(); ?>" required <?php if (disabled($usuario->getId())) {
              print "disabled";
            } ?>/>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Teléfono</span>
        <input id="datos-personales__telefono"
          name="usuarioConPersona[persona][telefono_persona]"
          class="input-field__input" type="number"
          placeholder="Ejemplo: 099 999 999" autocomplete="off"
          class="input-field__input" value="<?= $persona->getTelefono(); ?>"
          required <?php if (disabled($usuario->getId())) {
            print "disabled";
          } ?>/>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <input type="text" name="usuarioConPersona[persona][id_persona]" hidden
      value="<?= $persona->getId(); ?>">
      <?php if (!disabled($usuario->getId())) { ?>
        <div class="registro-remate__actions f-row">
      <div class="button">
        <input id="btn-actualizar-usuario" class="button__input" type="submit"
          value="Actualizar cambios" disabled/>
      </div>
    </div>
    <?php } ?>
  </div>
</div>