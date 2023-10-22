<div class="registro-remate__ficha">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Peso del lote</span>
        <input id="registro-remate__peso-ficha" name="peso_ficha"
          class="input-field__input" type="number" autocomplete="off"
          value="<?= $lote->getFicha()->getPeso(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Cantidad</span>
        <input id="registro-remate__cantidad-ficha" name="cantidad_ficha"
          class="input-field__input" type="number" autocomplete="off"
          value="<?= $lote->getFicha()->getCantidad(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Raza</span>
        <input id="registro-remate__raza-ficha" name="raza_ficha"
          class="input-field__input" type="text" autocomplete="off"
          value="<?= $lote->getFicha()->getRaza(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Descripción</span>
        <textarea id="registro-remate__descripcion_ficha"
          name="descripcion_ficha" class="input-field__input" rows="4"
          cols="50"><?= $lote->getFicha()->getDescripcion(); ?></textarea>
      </label>
      <span class="input-field__error-message hidden error">Error</span>
    </div>
  </div>
</div>