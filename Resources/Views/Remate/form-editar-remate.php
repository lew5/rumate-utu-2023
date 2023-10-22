<form id="actualizar_remate" class="registro-remate__form f-column"
  method="POST" autocomplete="off" enctype="multipart/form-data">
  <div class="registro-remate__remate f-column">
    <div class="inputs-wrap">
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Titilo del remate</span>
          <input id="registro-remate__titulo-remate" name="titulo_remate"
            class="input-field__input" type="text"
            placeholder="Ingresa el titulo del remate" autocomplete="off"
            value="<?= $remate->getTitulo(); ?>" />
        </label>
        <span class="input-field__error-message hidden error">El nombre no
          es valido</span>
      </div>

      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Imagen <span
              class="opcional">(opcional)</span></span>
          <input id="registro-remate__imagen_remate" name="imagen_remate"
            class="input-field__input" type="file"
            accept="image/png, image/jpeg" class="input-field__input" />
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
              type="datetime-local" class="input-field__input"
              value="<?= $remate->getFechaInicio(); ?>" />
          </label>
          <span class="input-field__error-message hidden error">Ingresa una
            fecha</span>
        </div>

        <div class="input-field">
          <label class="input-field__label f-column">
            <span class="label__text">Fecha de finalización</span>
            <input id="registro-remate__fecha_final_remate"
              name="fecha_final_remate" class="input-field__input"
              type="datetime-local" class="input-field__input"
              value="<?= $remate->getFechaFinal(); ?>" />
          </label>
          <span class="input-field__error-message hidden error">Ingresa una
            fecha</span>
        </div>

        <label class="input-field__label f-column">
          <span class="label__text">Categoría</span>
          <div class="filtro-container">
            <select class="input-field__input" id="registro-remate__estado"
              name="estado_remate">
              <option value="Pendiente" <?php if ($remate->getEstado() == "Pendiente") {
                print("selected");
              } ?>>
                Pendiente</option>
              <option value="Rematando" <?php if ($remate->getEstado() == "Rematando") {
                print("selected");
              } ?>>Rematando</option>
              <option value="Finalizado" <?php if ($remate->getEstado() == "Finalizado") {
                print("selected");
              } ?>>Finalizado</option>
            </select>
          </div>
        </label>
      </div>
    </div>
  </div>
  <div class="registro-remate__actions f-row">
    <div class="button">
      <input id="actualizar" class="button__input" type="submit"
        value="Actualizar remate" />
    </div>
  </div>
</form>