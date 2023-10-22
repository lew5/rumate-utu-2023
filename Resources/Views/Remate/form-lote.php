<div class="registro-remate__lote">
  <div class="inputs-wrap">
    <!-- <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Imagen <span
            class="opcional">(opcional)</span></span>
        <input id="registro-remate__imagen_lote" name="imagen_lote"
          class="input-field__input" type="file" accept="image/png, image/jpeg"
          class="input-field__input" />
      </label>
      <span class="input-field__error-message hidden error">El archivo
        debe ser una imagen</span>
    </div> -->
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Precio base</span>
        <input id="registro-remate__precio-base-lote" name="precio_base_lote"
          class="input-field__input" type="number" autocomplete="off" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Proveedor</span>
          <div class="filtro-container">
            <select class="input-field__input"
              id="registro-remate__proveedor-lote" name="id_proveedor_lote">
              <?php
              foreach ($proveedores as $proveedor) {
                var_dump($proveedor);
                ?>
                <option value="<?= $proveedor->getId(); ?>">
                  <?= $proveedor->getUsername(); ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </label>
        <span class="input-field__error-message hidden error">Error</span>
      </div>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Categoría</span>
          <div class="filtro-container">
            <select class="input-field__input" id="registro-remate__categoria"
              name="id_categoria_lote">
              <?php
              foreach ($categorias as $categoria) {
                ?>
                <option value="<?= $categoria->getId(); ?>">
                  <?= $categoria->getNombre(); ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </label>
        <span class="input-field__error-message hidden error">Error</span>
      </div>
    </div>
  </div>