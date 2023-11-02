<div class="card-remate">
  <img class="card-remate__image" src="<?= $lote->getImagen(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title">LOTE de
      <?= $lote->getCategoria()->getNombre(); ?>s
      <a href=""><span>#<?= $lote->getProveedor()->getUsername(); ?></span></a>
    </h2>
    <p class="card-remate__data"><b>Proveedor:
      </b><?= $lote->getCategoria()->getNombre(); ?>
    </p>
    <p class="card-remate__data"><b>Cantidad:
      </b><?= $lote->getFicha()->getCantidad(); ?></p>
    <p class="card-remate__data"><b>Peso:
      </b><?= $lote->getFicha()->getPeso(); ?>
      kg</p>
  </div>
  <div class="card-remate__button">
    <?php if ($lote->getIdRemate()): ?>
      <a href="<?= PUBLIC_PATH ?>/remate/<?= $lote->getIdRemate(); ?>/lote/<?= $lote->getId(); ?>"
        class="link">ver lote</a>
    <?php else: ?>
      <span>Sin asignar</span>
    <?php endif; ?>
  </div>
</div>