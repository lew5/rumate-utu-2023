<div class="filtro-container">
  <?php if (isset($lotes)) { ?>
    <label class="filtro-label" for="categoria">Categoría:</label>
    <select class="input-field__input" id="categoria">
      <?php
      foreach ($lotes as $lote) { ?>
        <option value="<?= $lote->getCategoria(); ?>">
          <?= $lote->getCategoria(); ?>
        </option>
      <?php } ?>
    </select>
  <?php } elseif (isset($remates_data)) { ?>
    <label class="filtro-label" for="estado">Estado:</label>
    <select class="input-field__input" id="estado">
      <option value="">Todos</option>
      <option value="en-progreso">Rematando</option>
      <option value="pendiente">Pendiente</option>
      <option value="finalizado">Finalizado</option>
    </select>
  <?php } ?>
</div>