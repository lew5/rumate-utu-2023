<div class="card-remate">
  <img class="card-remate__image"
    src="<?= PUBLIC_PATH ?>/Public/imgs/no-image.webp" alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title">LOTE DE <?= $lote->getCategoria(); ?></h2>
    <p class="card-remate__data"><b>Categoría: </b><?= $lote->getCategoria(); ?>
    </p>
    <p class="card-remate__data"><b>Cantidad:
      </b><?= $lote->getFicha()->getCantidad(); ?></p>
    <p class="card-remate__data"><b>Peso:
      </b><?= $lote->getFicha()->getPeso(); ?>
      kg</p>
  </div>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/remate/<?= $lote->getIdRemate(); ?>/lote/<?= $lote->getId(); ?>"
      class="link">Participar</a>
  </div>
</div>