<div class="card-remate">
  <img class="card-remate__image"
    src="<?= PUBLIC_PATH ?>/Public/imgs/no-image.webp" alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title">LOTE de
      <?= $lote->getCategoria()->getNombre(); ?>s</h2>
    <p class="card-remate__data"><b>Categoría:
      </b><?= $lote->getCategoria()->getNombre(); ?>
    </p>
    <p class="card-remate__data"><b>Cantidad:
      </b><?= $lote->getFicha()->getCantidad(); ?></p>
    <p class="card-remate__data"><b>Peso:
      </b><?= $lote->getFicha()->getPeso(); ?>
      kg</p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button card-remate__button--eliminar">
      <a href="<?= PUBLIC_PATH ?>/admin/lote/eliminar/<?= $lote->getId(); ?>"
        class="link">Eliminar</a>
    </div>
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