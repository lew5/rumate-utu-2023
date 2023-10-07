<?php $fecha = formatFecha($remate->getFecha(), $remate->getHora()); ?>
<div class="card-remate">
  <img class="card-remate__image" src="<?= $remate->getImg(); ?>"
    alt="Imagen de remate">
  <div class="card-remate__info">
    <h2 class="card-remate__title"><?= $remate->getTitulo(); ?></h2>
    <p class="card-remate__data"><b>Fecha: </b><?= $fecha; ?> hs.</p>
    <p class="card-remate__data"><b>Estado:
      </b><span
        class="card-remate__estado--<?=$remate->getEstado();?>"><?= $remate->getEstado(); ?></span>
    </p>
  </div>
  <?php if (sessionAdmin() || sessionRoot()) { ?>
    <div class="card-remate__button">
      <a href="/remate/editar/<?= $remate->getId(); ?>" class="link">Editar</a>
    </div>
  <?php } ?>
  <div class="card-remate__button">
    <a href="/remate/<?= $remate->getId(); ?>" class="link">Ver
      remate</a>
  </div>
</div>