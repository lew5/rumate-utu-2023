<?php
?>
<div class="card-remate">
  <img class="card-remate__image" src="<?= $remate->getImagen(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $remate->getTitulo(); ?></h2>
    <p class="card-remate__data"><b>Inicia:
      </b><?= $remate->getFechaInicio(); ?>
      hs.</p>
    <p class="card-remate__data"><b>Finaliza:
      </b><?= $remate->getFechaFinal(); ?>
      hs.</p>
    <p class="card-remate__data"><b>Estado:
      </b><span
        class="card-remate__estado--<?= $remate->getEstado(); ?>"><?= $remate->getEstado(); ?></span>
    </p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button card-remate__button--eliminar">
      <a href="<?= PUBLIC_PATH ?>/remate/editar/<?= $remate->getId(); ?>"
        class="link">Eliminar</a>
    </div>
    <div class="card-remate__button">
      <a href="<?= PUBLIC_PATH ?>/remate/editar/<?= $remate->getId(); ?>"
        class="link">Editar</a>
    </div>
  <?php } ?>
  <div class="card-remate__button">
    <a href="<?= PUBLIC_PATH ?>/remate/<?= $remate->getId(); ?>"
      class="link">Ver
      remate</a>
  </div>
</div>