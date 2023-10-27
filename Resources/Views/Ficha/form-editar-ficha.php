<div class="editar-lote__ficha f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Peso del lote</span>
        <input id="editar-lote__peso-ficha"
          name="loteConFicha[ficha][peso_ficha]" class="input-field__input"
          type="number" autocomplete="off"
          value="<?= $lote->getFicha()->getPeso(); ?>" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Cantidad</span>
        <input id="editar-lote__cantidad-ficha"
          name="loteConFicha[ficha][cantidad_ficha]" class="input-field__input"
          type="number" autocomplete="off"
          value="<?= $lote->getFicha()->getCantidad(); ?>" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Raza</span>
        <input id="editar-lote__raza-ficha"
          name="loteConFicha[ficha][raza_ficha]" class="input-field__input"
          type="text" autocomplete="off"
          value="<?= $lote->getFicha()->getRaza(); ?>" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Descripción</span>
        <textarea id="editar-lote__descripcion_ficha"
          name="loteConFicha[ficha][descripcion_ficha]"
          class="input-field__input" rows="4" cols="50"
          required><?= $lote->getFicha()->getDescripcion(); ?></textarea>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="registro-remate__actions f-row">
      <div class="button">
        <input id="eliminar-lote" class="button__input button--eliminar"
          type="button" value="Eliminar lote" />
      </div>
      <div class="button">
        <input id="actualizar" class="button__input" type="submit"
          value="Actualizar cambios" />
      </div>
    </div>
  </div>
</div>