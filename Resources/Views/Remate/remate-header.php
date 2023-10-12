<div class="header">
  <div class="container-1024 f-row">
    <h2><?= $header_title ?></h2>
    <div class="filtro-container">
      <?php if (isset($lotes)) { ?>
        <label class="filtro-label" for="categoria">Categoría:</label>
        <select class="input-field__input" id="categoria">
          <?php
          foreach ($lotes as $lote) {
            $lote = (object) $lote;
            ?>
            <option value="<?= $lote->nombre_categoria; ?>">
              <?= $lote->nombre_categoria; ?>
            </option>
          <?php } ?>
        </select>
      <?php } ?>
    </div>
  </div>
</div>