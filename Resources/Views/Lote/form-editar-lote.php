<div class="registro-remate__lote">
  <div class="inputs-wrap">
    <div class="input-field">
      <label class="input-field__label f-column">
        <span class="label__text">Precio base</span>
        <input id="registro-remate__precio-base-lote" name="precio_base_lote"
          class="input-field__input" type="number" autocomplete="off"
          value="<?= $lote->getPrecioBase(); ?>" />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Proveedor</span>
          <div class="filtro-container">
            <select class="input-field__input"
              id="registro-remate__proveedor-lote" name="id_proveedor_lote">
              <?php
              foreach ($proveedores as $proveedor) { ?>
                <?php if ($proveedor->getId() == $lote->getIdProveedor()): ?>
                  <option value="<?= $lote->getIdProveedor(); ?>" selected>
                    <?= $proveedor->getUsername(); ?>
                  </option>
                <?php else: ?>
                  <option value="<?= $lote->getIdProveedor(); ?>">
                    <?= $proveedor->getUsername(); ?>
                  </option>
                <?php endif ?>
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
              foreach ($categorias as $categoria) { ?>
                <?php if ($categoria->getId() == $lote->getIdCategoria()): ?>
                  <option value="<?= $lote->getIdCategoria(); ?>" selected>
                    <?= $categoria->getNombre(); ?>
                  </option>
                <?php else: ?>
                  <option value="<?= $categoria->getId(); ?>">
                    <?= $categoria->getNombre(); ?>
                  </option>
                <?php endif ?>
              <?php } ?>
            </select>
          </div>
        </label>
        <span class="input-field__error-message hidden error">Error</span>
      </div>
    </div>
  </div>