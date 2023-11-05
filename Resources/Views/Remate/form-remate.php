<div class="registro-remate__remate f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Titulo del remate</span>
        <input id="registro-remate__titulo-remate" name="titulo_remate"
          class="input-field__input" type="text"
          placeholder="Ingresa el titulo del remate" autocomplete="off" required/>
      </label>
      <span class="input-field__error-message hidden error">El nombre no
        es valido</span>
    </div>

    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Imagen <span
            class="opcional">(opcional)</span></span>
        <input id="registro-remate__imagen_remate" name="imagen_remate"
          class="input-field__input" type="file" accept="image/png, image/jpeg"
          class="input-field__input" />
      </label>
      <span class="input-field__error-message hidden error">El archivo
        debe ser una imagen</span>
    </div>

    <div>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Fecha de inicio</span>
          <input id="registro-remate__fecha_inicio_remate"
            name="fecha_inicio_remate" class="input-field__input"
            type="datetime-local" class="input-field__input" required/>
        </label>
        <span class="input-field__error-message hidden error">Ingresa una
          fecha</span>
      </div>

      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Fecha de finalización</span>
          <input id="registro-remate__fecha_final_remate"
            name="fecha_final_remate" class="input-field__input"
            type="datetime-local" class="input-field__input" />
        </label>
        <span class="input-field__error-message hidden error">Ingresa una
          fecha</span>
      </div>
    </div>
  </div>
</div>