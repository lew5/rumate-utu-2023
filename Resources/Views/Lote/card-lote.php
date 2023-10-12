<div class="card-remate">
  <img class="card-remate__image"
    src="<?= PUBLIC_PATH ?>/Public/imgs/no-image.webp" alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title">LOTE DE <?= $lote->nombre_categoria; ?></h2>
    <p class="card-remate__data"><b>Categoría:
      </b><?= $lote->nombre_categoria; ?>
    </p>
    <p class="card-remate__data"><b>Cantidad:
      </b><?= $lote->cantidad_ficha; ?></p>
    <p class="card-remate__data"><b>Peso:
      </b><?= $lote->peso_ficha; ?>
      kg</p>
  </div>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/remate/<?= $lote->id_remate; ?>/lote/<?= $lote->id_lote; ?>"
      class="link">Participar</a>
  </div>
</div>