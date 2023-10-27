<div class="card-remate">
  <img class="card-remate__image" src="<?= $lote->getImagen(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title">LOTE de
      <?= $lote->getCategoria()->getNombre(); ?>s</h2>
    <p class="card-remate__data"><b>Proveedor:
      </b><?= $lote->getProveedor()->getUsername(); ?>
    </p>
    <p class="card-remate__data"><b>Cantidad:
      </b><?= $lote->getFicha()->getCantidad(); ?></p>
    <p class="card-remate__data"><b>Peso:
      </b><?= $lote->getFicha()->getPeso(); ?>
      kg</p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button">
      <a href="<?= PUBLIC_PATH ?>/admin/lote/editar/<?= $lote->getId(); ?>"
        class="link">Editar</a>
    </div>
  <?php } ?>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/remate/<?= $lote->getId(); ?>/lote/<?= $lote->getId(); ?>"
      class="link">Participar</a>
  </div>
</div>