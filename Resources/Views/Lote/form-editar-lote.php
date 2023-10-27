<div class="editar-lote__lote f-column align-center">
  <div class="inputs-wrap">
    <div class="input-field">
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Imagen <span
              class="opcional">(opcional)</span></span>
          <input id="editar-lote__imagen_lote" name="imagen_lote"
            class="input-field__input" type="file" value="0"
            accept="image/png, image/jpeg" class="input-field__input" />
        </label>
        <span class="input-field__error-message hidden error">El archivo
          debe ser una imagen</span>
      </div>
      <label class="input-field__label f-column">
        <span class="label__text">Precio base</span>
        <input id="editar-lote__precio-base-lote"
          name="loteConFicha[lote][precio_base_lote]" class="input-field__input"
          type="number" autocomplete="off"
          value="<?= $lote->getPrecioBase(); ?>" required />
      </label>
      <span class="input-field__error-message hidden error">Error</span>
      <div class="input-field">
        <label class="input-field__label f-column">
          <span class="label__text">Proveedor</span>
          <div class="filtro-container">
            <select class="input-field__input" id="editar-lote__proveedor-lote"
              name="loteConFicha[lote][id_proveedor_lote]" required>
              <?php
              foreach ($proveedores as $proveedor) { ?>
                <?php if ($proveedor->getId() == $lote->getIdProveedor()): ?>
                  <option value="<?= $lote->getIdProveedor(); ?>" selected>
                    <?= $proveedor->getUsuario()->getUsername(); ?>
                  </option>
                <?php else: ?>
                  <option value="<?= $proveedor->getId(); ?>">
                    <?= $proveedor->getUsuario()->getUsername(); ?>
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
            <select class="input-field__input" id="editar-lote__categoria"
              name="loteConFicha[lote][id_categoria_lote]" required>
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
</div>